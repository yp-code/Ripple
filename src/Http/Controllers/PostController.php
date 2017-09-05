<?php

namespace GitLab\Ripple\Http\Controllers;

use GitLab\Ripple\Support\Facades\Ripple;
use GitLab\Ripple\Support\Traits\Posts;

class PostController extends Controller {

    use Posts;

    public function postIndex() {
        return view('Ripple::posts.postIndex');
    }

    public function postAdd() {
        $categories = Ripple::allCategories();
        $tags = Ripple::allTags();
        self::createPost();
        return view('Ripple::posts.postAdd', compact('categories', 'tags'));
    }

}
