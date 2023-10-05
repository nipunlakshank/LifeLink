<?php

/**
 * Home Controller
 */

class Home extends Controller
{
    protected string $title = "Home";

    public function index(): void
    {
        $data = $this->loadData();
        $this->view('home', $data);
    }

    private function loadData(): array
    {
        $post = new Post();
        $posts = $post->getPosts();
        $data["posts"] = $posts;

        $category = new PostCategory();
        $data['categories'] = $category->selectAll();

        $type = new PostType();
        $data["types"] = $type->selectAll();

        return $data;
    }
}
