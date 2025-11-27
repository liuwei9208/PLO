<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class ShizukuPageLayout extends Component
{
    public string $pageTitle;
    public string $pageSubtitle;
    public string $breadcrumb;
    public array $assets;

    public function __construct(
        string $pageTitle,
        string $pageSubtitle,
        string $breadcrumb,
        array $assets = []
    ) {
        $this->pageTitle = $pageTitle;
        $this->pageSubtitle = $pageSubtitle;
        $this->breadcrumb = $breadcrumb;
        $this->assets = $assets;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('components.shizuku-page-layout');
    }
}

