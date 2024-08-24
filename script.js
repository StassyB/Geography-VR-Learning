document.addEventListener('DOMContentLoaded', () => {
    // Initialize the VR scene
    const scene = document.createElement('a-scene');
    scene.setAttribute('embedded', ''); // This attribute makes the scene embedded within the web page
    
    // Add a box for demonstration
    const box = document.createElement('a-box');
    box.setAttribute('position', '0 1.5 -3');
    box.setAttribute('rotation', '0 45 0');
    box.setAttribute('color', '#4CC3D9');
    scene.appendChild(box);

    // Example of adding interactivity with landmarks
    const landmarks = [
        { position: '0 1.5 -3', src: 'img/landmark1.jpg', info: 'Landmark 1: Description' },
        { position: '2 1.5 -5', src: 'img/landmark2.jpg', info: 'Landmark 2: Description' },
        { position: '-2 1.5 -5', src: 'img/landmark3.jpg', info: 'Landmark 3: Description' }
    ];

    landmarks.forEach(landmark => {
        const entity = document.createElement('a-image');
        entity.setAttribute('src', landmark.src);
        entity.setAttribute('position', landmark.position);
        entity.setAttribute('look-at', '[camera]');
        entity.addEventListener('click', () => {
            alert(landmark.info);
        });
        scene.appendChild(entity);
    });

    document.getElementById('vr-container').appendChild(scene);

    // Handle quiz form submission
    document.getElementById('quiz-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const answer = document.querySelector('input[name="capital"]:checked').value;
        const feedback = document.getElementById('quiz-feedback');

        if (answer === 'Paris') {
            feedback.textContent = 'Correct! Paris is the capital of France.';
            feedback.style.color = 'green';
        } else {
            feedback.textContent = 'Incorrect. Please try again.';
            feedback.style.color = 'red';
        }
    });
});
