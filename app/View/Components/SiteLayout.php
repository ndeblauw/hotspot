<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SiteLayout extends Component
{
    /**
     * @var list<array{label: string, link: string, match: string}>
     */
    public array $menu;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menu = [
            ['label' => 'Home', 'link' => route('home'), 'match' => 'home'],
            ['label' => 'Articles', 'link' => route('articles.index'), 'match' => 'articles.*'],
            ['label' => 'Authors', 'link' => route('authors.index'), 'match' => 'authors.*'],
            ['label' => 'Keywords', 'link' => route('keywords.index'), 'match' => 'keywords.*'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.site');
    }
}
