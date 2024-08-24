<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>360&deg; Video</title>
    <meta name="description" content="360&deg; Video - A-Frame">
    <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
    <script src="js/hide-on-play.js"></script>
    <script src="js/hide-on-play.js"></script>
</head>
<body>
    <a-scene>
        <!-- 360-degree Video -->
        <a-videosphere src="assets/img/sahara.mp4" rotation="0 -130 0"></a-videosphere>

        <!-- Text Element - Welcome Message -->
        
        <!-- Teleport Controls for Navigation -->
        <a-entity id="rig" movement-controls>
            <a-entity camera look-controls wasd-controls position="0 1.6 0"></a-entity>
            <a-entity cursor="fuse: true; fuseTimeout: 500"
                      position="0 0 -1"
                      geometry="primitive: ring; radiusOuter: 0.02; radiusInner: 0.01"
                      material="color: cyan; shader: flat"></a-entity>
        </a-entity>

        <a-entity id="teleport" teleport-controls="cameraRig: #rig; teleportOrigin: #rig; hitEntity: #ground">
            <a-entity geometry="primitive: ring; radiusOuter: 0.3; radiusInner: 0.1"
                      material="color: green; opacity: 0.75"></a-entity>
        </a-entity>
        
        <!-- Ground Plane -->
       
        
        <!-- A-Frame Component to Play Video on Click -->
        <script>
            AFRAME.registerComponent('play-on-click', {
              init: function () {
                this.onClick = this.onClick.bind(this);
              },
              play: function () {
                window.addEventListener('click', this.onClick);
              },
              pause: function () {
                window.removeEventListener('click', this.onClick);
              },
              onClick: function (evt) {
                var videoEl = this.el.components.material.material.map.image;
                if (!videoEl) { return; }
                this.el.object3D.visible = true;
                videoEl.play();
              }
            });
        </script>
    </a-scene>
</body>
</html>
