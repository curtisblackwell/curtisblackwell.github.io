---
extends: _layouts.post
section: content
title: Generating random alphanumeric strings with Faker
published: true
featured: false
categories: [Quick Tips, TDD, Laravel]
---




Just wanted to share a quick little thing I learned you could do with [Faker](https://fakerphp.github.io), a library I've been using for years in writing tests.

*[Fuck context, show me the coolness.](#tldr-mofo)*

I'm writing tests for an API integration where I need to fake some IDs that, in production, would come from the API. The IDs are always 20–24-character alphanumeric strings.

At first, I thought I might need to do something like use the `password` method and make sure it was long enough that I could strip out any non-alphanumeric characters. But that felt tedious and over-engineered, so I started thinking about shuffling a long alphanumeric string and truncating it.

Then I noticed the [`regexify` method](https://fakerphp.github.io/formatters/numbers-and-strings/#regexify). It's a little weird to use a searching/matching pattern as a way to generate a random string, but it was simple and intuitive enough.


```php{#tldr-mofo}
$this->faker->regexify('[a-z0-9]{20,24}');
```
