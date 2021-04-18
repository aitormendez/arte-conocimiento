import * as THREE from 'three';
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js';
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls.js';
// import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js';


$(document).ready(() => {

  // crear escena
  const scene = new THREE.Scene();
  scene.background = new THREE.Color(0x2a3b4c);
  scene.fog = new THREE.Fog(0x76456c, 0.1, 8);
  let loader = new THREE.TextureLoader();
  loader.load('/app/themes/ac/public/images/fondoprueba.jpg', function(texture){
    scene.background = texture;
  });

  // añadir cámara
  const camera = new THREE.PerspectiveCamera(
    75,
    window.innerWidth / window.innerHeight,
    0.1,
    1000
  );

  // renderer
  const renderer = new THREE.WebGLRenderer();
  renderer.setSize( window.innerWidth, window.innerHeight );
  document.body.appendChild( renderer.domElement );

  // añadir geometría
  let geometry = new THREE.BoxGeometry(0.5, 3);
  let material = new THREE.MeshBasicMaterial({
    color: 0x00ff00,
    wireframe: true
  });
  let cube = new THREE.Mesh( geometry, material );

  let circle = new THREE.Mesh(new THREE.CircleGeometry(2, 32), material);
  circle.position.x = 2
  scene.add(circle);

  scene.add( cube );
  camera.position.z = 5;
  let controls = new OrbitControls(camera, renderer.domElement);
  controls.minDistance = 3;
  controls.maxDistance = 10;
  controls.enableDamping = true;
  controls.dampingFactor = 0.1;

  // const loader2 = new GLTFLoader();
  // loader2.load( '/app/themes/ac/public/images/3d/cubo.glb', function ( gltf ) {
  //   scene.add( gltf.scene );
  // }, undefined, function ( error ) {
  //   console.error( error );
  // } );

  window.addEventListener('resize', redimensionar);

  function redimensionar() {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize( window.innerWidth, window.innerHeight );
    renderer.render( scene, camera );
  }

  //animacion
  let animate = function() {
    requestAnimationFrame(animate);

    scene.traverse(function(object) {
      if(object.isMesh === true) {
        object.rotation.x += 0.01;
        object.rotation.y += 0.01;
      }
    });

    // cube.rotation.x += 0.01;
    // cube.rotation.y += 0.01;
    renderer.render( scene, camera );
  }

  animate();

});
