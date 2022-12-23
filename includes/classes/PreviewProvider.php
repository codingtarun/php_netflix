<?php
class PreviewProvider
{
    private $con;
    private $username;
    public function __construct($con, $username)
    {
        $this->con = $con;
        $this->username = $username;
    }
    public function getImagePreview($entity)
    {
        if ($entity == null) {
            $entity = $this->getRandomEntity();
        }
        return $entity;
    }
    public function getVideoPreview($entity)
    {
        if ($entity == null) {
            $entity = $this->getRandomEntity();
        }
        return "
                <div class='video_box'>
                <img class='preview-img' src=/" . $entity->getThumbnail() . " style='display:none;' >
                <video autoplay muted class='preview-video' onended='previewEnded();'>
                    <source src= /" . $entity->getPreview() . " type='video/mp4'>
                </video>
                <div class='video_box-overlay'>
                    <div class='video_box-overlay-controls'>
                        <h2>" . $entity->getName() . "</h2>
                        <h4>Season 1, Episode 1 </h4>
                        <button class='btn-play'><i class='fa-solid fa-play'></i> Play</button>
                        <button class='btn-mute' onClick='volumeToggle(this); '><i class='fa-solid fa-volume-xmark'></i> Mute</button>
                    </div>
                </div>
                </div>";
    }
    private function getRandomEntity()
    {
        $entity = EntityProvider::getEntities($this->con, null, 1);
        return $entity[0];
    }
}
