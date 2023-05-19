<?php

namespace Models\Components;


class BreadCrumbComponent
{
    public function getComponent()
    {
        return
            '<nav class="breadcrumb">
                <a class="breadcrumb-item" href="#">Home</a>
                <span class="breadcrumb-item active" aria-current="page">FAQs</span>
            </nav>';
    }
}