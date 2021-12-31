<?php

return [
    'md' => function () {
        return '<?php ob_start(); ?>';
    },
    'endmd' => function () {
        return <<<'PHP'
            <?php
                $content = preg_replace('/^ */m', '', ob_get_clean());
                echo (new \TightenCo\Jigsaw\Parsers\JigsawMarkdownParser)->parse($content);
            ?>
        PHP;
    },
];
