<?php
class CategoryContainers
{
    private $con;
    public function __construct($con)
    {
        $this->con = $con;
    }

    public function getAllCategories()
    {
        $query = $this->con->prepare("SELECT * FROM categories");
        $query->execute();
        $html = "";
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $html .= $this->getCategoryHtml($row, null, true, true);
        }


        return $html;
    }
    private function getCategoryHtml($sqlData, $title, $tvShows, $movies)
    {
        $categoryId = $sqlData['id'];
        $categoryTitle = $title == null ? $sqlData['name'] : $title;
        if ($tvShows && $movies) {
            $entities = EntityProvider::getEntities($this->con, $categoryId, 4);
        } else if ($tvShows) {
            // GET TV SHOWS
        } else {
            //GET MOVIES
        }

        if (sizeof($entities) == 0) {
            return;
        }
        $html = "";
        $ent = "";
        foreach ($entities as $entity) {
            $ent .= "<div class='col-3'>
                        <img class='img-fluid' src=/" . $entity->getThumbnail() . " style='height:150px'>
                        <h4>" . $entity->getName() . "</h4>
                    </div>";
        }


        $html .= "<div class='row'>
                    <div class='col-12'>
                        <h2>
                            " . $categoryTitle . "
                        </h2>
                        <div class='row'>
                        " . $ent . "
                        </div>
                    </div>
                </div>";
        return $html;
    }
}
