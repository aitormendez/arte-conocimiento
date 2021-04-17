import * as THREE from 'three';
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js';


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
  let geometry = new THREE.BoxGeometry();
  let material = new THREE.MeshBasicMaterial({
    color: 0x00ff00,
    // wireframe: true
  });
  let cube = new THREE.Mesh( geometry, material );

  scene.add( cube );
  camera.position.z = 5;

  // const loader2 = new GLTFLoader();
  // loader2.load( '/app/themes/ac/public/images/3d/cubo.glb', function ( gltf ) {
  //   scene.add( gltf.scene );
  // }, undefined, function ( error ) {
  //   console.error( error );
  // } );


  //animacion
  let animate = function() {
    requestAnimationFrame(animate);
    cube.rotation.x += 0.01;
    cube.rotation.y += 0.01;
    renderer.render( scene, camera );
  }

  animate();

});
