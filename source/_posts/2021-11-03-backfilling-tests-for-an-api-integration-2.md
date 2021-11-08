---
extends: _layouts.post
featured: false
section: content
title: RENAME ME
published: false
---

#todo
- [ ] Remove Brandfolder references
- [ ] Generalize examples
- [ ] Give a better title?



Generally speaking, I prefer to avoid [test doubles](https://martinfowler.com/bliki/TestDouble.html) as much as possible. But since we're working with an external service and we don't want to rely on their availability or consume resources (we face limited top-level entities and rate limiting) to run our tests, we'll have to do some doubling.

When using test doubles, I find it most helpful to create doubles at the edges of what I'm testing.

That either means
1. Finding the point where API calls are made and using test doubles to right before the API request or
2. Finding the inputs/outputs of what where we're actually testing and creating doubles there.

We want to test our app, not the external service. So I try to maximize the amount of code we own getting executed without executing anything on the external side. But I make judgment calls on the trade-offs. For example, stubbing a response is often more effort than it's worth, so I may create a mock closer to our code or just a spy to ensure a method is called instead.

Here's the test I wrote for to ensure `CatalogRecordDAMEntityService::createFromCatalogRecord()` gets called on a `CatalogRecord`'s `created` event:

```php
public function creating_a_catalog_record_attempts_to_create_a_dam_entity()
{
    // Arrange
    // Prep a CatalogRecord.
    $catalogRecord = CatalogRecord::factory()->withDependencies()->make([
        'series_id'   => 1,
        'year_start'  => 2021,
        'year_end'    => 2021,
        'location_id' => 1,
    ]);
    // We should avoid aliases, but no time to go and figure out better ways of doing things.
    $catalogRecordDAMEntityService = $this->spy(
        'alias:' . CatalogRecordDAMEntityService::class
    );

    // Act
    // Save it.
    $catalogRecord->save();

    // Assert
    // Ensure it gets sent to the DAM.
    $catalogRecordDAMEntityService->shouldHaveReceived('createFromCatalogRecord');
}
```

The other scenario I'm concerned with here is when the related `Client` isn't connected to a DAM, I don't want any API calls made. That logic is contained within `CatalogRecordDAMEntityService::createFromCatalogRecord()`, so I won't have to use any test doubles. I can just write a test called `creating_a_catalog_record_does_not_make_api_calls_if_the_client_is_using_a_dam` and assert that the method returns `null` when the `Client` has no DAM.

However, now that I've thought through that test, I've realized I'll be able to
1. copy most of its Arrange and Act steps, but
2. make the app think the `Client` is connected to a DAM and
3. either 
    1. fake the response to the `createFromCatalogRecord()` nested in `CatalogRecordDAMEntityService::createFromCatalogRecord()` with a dummy object (`DAMEntity`) that the app can handle as though it was real or
     2. fake the responses to `CatalogRecordDAMEntityService::createFromCatalogRecord()` and `CatalogRecordDAMEntityService::formatDAMDataForDatabase()` in the `CatalogRecordObserver`, which is closer to our code and further from the DAM logic and
4. make assertions against the results.

That will be a small amount of effort and provide significantly more confidence in the app than the spy in `creating_a_catalog_record_attempts_to_create_a_dam_entity` above, so I'll do that. Then I'll delete the old test since I have two new tests that both already prove the first test passes.

---

We’re **not trying to get 100% code coverage**, but we **are trying to cover as close to 100% of the scenarios** as we can get within a reasonable timeframe.

Let’s focus on what the Brain does in different scenarios, but **not** worry about Brandfolder-specific implementations of interfaces for now, since those sorts of tests tend to be higher effort for lower value.

---

UPDATE: I originally chose option 3.1 as outlined above, but it was kind of a pain and it reminded me that doubles in chained methods like the example below are often painful (due to requiring nested doubles) and make for brittle tests. So I opted for 3.2, which required a single mock with two methods 

```php
return DAMBuilder::make($client->dam_type)
    ->catalogRecordDAMEntities()
    ->createFromCatalogRecord($client->dam_entity_id, $catalogRecord, $collection);
```
