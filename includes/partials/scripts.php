 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
 <script>
     function volumeToggle(btn) {
         var muted = $(".preview-video").prop("muted");
         $(".preview-video").prop("muted", !muted);

         $(".btn-mute").find("i").toggleClass("fa-volume-xmark");
         $(".btn-mute").find("i").toggleClass("fa-volume-up");
     }

     function previewEnded() {
         $(".preview-img").toggle();
         $(".preview-video").toggle();
     }
 </script>