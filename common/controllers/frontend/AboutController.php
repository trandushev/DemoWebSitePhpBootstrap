<?php

class AboutController extends Controller {


    public function index()
    {
        $data=array();

        $guidesCollection = new GuideCollection();
        $guides = $guidesCollection->getAll();

        $data['guides'] = $guides;

        $this->loadFrontView('about/about', $data);
    }

    public function show()
    {
        $data=array();

        $guideId = isset($_GET['id'])? (int)$_GET['id']: 0;

        $guidesCollection = new GuideCollection();
        $guide = $guidesCollection->getOne($guideId);

        $data['guide'] = $guide;

        $this->loadFrontView('about/show', $data);
    }



}