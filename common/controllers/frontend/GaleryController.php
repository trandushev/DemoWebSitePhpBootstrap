<?php
class GaleryController extends Controller {

    public function index()
    {
        $data = array();

        $tourImages = new ToursImagesCollection();
        $allImages = $tourImages->getAll();


        $data['allImages'] = $allImages;
        $this->loadFrontView('galery/listing', $data);
    }


    public function show()
    {
        $data = array();

        $tourId = isset($_GET['id'])? (int)$_GET['id']: 0;

        if($tourId == 0) {
            header("Location: index.php?c=galery");
        }

        $toursCollection = new ToursCollection();
        $tour = $toursCollection->getOne($tourId);

        if ($tour === null) {
            header("Location: index.php?c=tours");
        }

        $tourImagesCollection = new ToursImagesCollection();
        $tourImages = $tourImagesCollection->getAll(array());

        $data['tourImages'] = $tourImages;

        $this->loadFrontView('galery/listing', $data);
    }
}
