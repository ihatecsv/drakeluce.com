function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function loadScript(url, callback){
    var script = document.createElement("script")
    script.type = "text/javascript";

    if (script.readyState){  //IE
        script.onreadystatechange = function(){
            if (script.readyState == "loaded" ||
                    script.readyState == "complete"){
                script.onreadystatechange = null;
                callback();
            }
        };
    } else {  //Others
        script.onload = function(){
            callback();
        };
    }

    script.src = url;
    document.getElementsByTagName("head")[0].appendChild(script);
}

var cubey = false;

$("#profile").dblclick(function() {
	if(!cubey){
		$('#warningModal').modal('show');
		var count = 3;
		$('#acceptbtn').prop('disabled', true);
		$('#acceptbtn').html(count);
		var countdown = setInterval(function(){
			if(count != 0){	
				$('#acceptbtn').prop('disabled', true);
				$('#acceptbtn').html(count);
				count--;
			}else{
				$('#acceptbtn').prop('disabled', false);
				$('#acceptbtn').html("I'm not epileptic");
				clearInterval(countdown);
			}
		},1000);
	}
});

$("#acceptbtn").click(function() {
	if(!cubey){
		$('#warningModal').modal('hide');
		cubey = true;
		$("#profile").addClass("rotating");
		loadScript("js/three.min.js", getCubey);
	}
});

function getCubey() {
	var scene = new THREE.Scene();
	var camera = new THREE.PerspectiveCamera( 75, window.innerWidth/window.innerHeight, 0.1, 1000 );

	var curX = 1;
	var curY = 1;
	var size = 10;

	var renderer = new THREE.WebGLRenderer( { alpha: true } );
	renderer.setSize( window.innerWidth, window.innerHeight );
	//renderer.setClearColor( 0x000000, 0 );
	document.body.appendChild( renderer.domElement );

	//var geometry = new THREE.BoxGeometry(0.7, 0.7, 0.7);
	var geometry = new THREE.TorusKnotGeometry( 10, 3, 100, 16 );
	var material = new THREE.MeshNormalMaterial();

	var cubeArray = [];
	for(var i = -1*size; i <= size; i++){
		for(var j = -1*size; j <= size; j++){
			var cube = new THREE.Mesh(geometry, material);
			cube.position.x = i;
			cube.position.y = j;
			//cube.rotation.x = Date.now() / 1000 | 0;
			//cube.rotation.z = Date.now() / 1000 | 0;
			scene.add(cube);
			cubeArray.push(cube);
		}
	}

	camera.position.z = 5;

	var render = function () {
		requestAnimationFrame( render );
		for (var i = 0; i < cubeArray.length; i++) {
			cubeArray[i].scale.x = lerp(cubeArray[i].scale.x, curX/500, 0.01);
			cubeArray[i].scale.y = lerp(cubeArray[i].scale.y, curY/500, 0.01);
			cubeArray[i].scale.z = lerp(cubeArray[i].scale.z, cubeArray[i].scale.x + cubeArray[i].scale.y, 0.01);
			cubeArray[i].rotation.x = lerp(cubeArray[i].rotation.x, curX/500, 0.01);
			cubeArray[i].rotation.y = lerp(cubeArray[i].rotation.y, curY/500, 0.01);
			cubeArray[i].rotation.z = lerp(cubeArray[i].rotation.z, cubeArray[i].rotation.x + cubeArray[i].rotation.y, 0.01);
			$(".rotating").css("animation", "rotating " + (10/Math.sqrt(curX + curY)) + "s linear infinite");
		}
		
		/*for (var i = 0; i < cubeArray.length; i++) {
			if((Date.now() / 1000 | 0)%2 == 0){
				cubeArray[i].rotation.z = lerp(cubeArray[i].rotation.z, Date.now() / 1000 | 0 , 0.2);
			}else{
				cubeArray[i].rotation.x = lerp(cubeArray[i].rotation.x, Date.now() / 1000 | 0 , 0.2);
			}
		}*/

		renderer.render(scene, camera);
	};

	render();

	window.addEventListener( 'resize', onWindowResize, false );
	function onWindowResize(){
		camera.aspect = window.innerWidth / window.innerHeight;
		camera.updateProjectionMatrix();

		renderer.setSize( window.innerWidth, window.innerHeight );
	}

	function lerp(position, targetPosition, amount) {
		position += (targetPosition- position)*amount;
		return position;
	}

	$("body").mousemove(function( event ) {
		curX = event.pageY;
		curY = event.pageX;
	});
}