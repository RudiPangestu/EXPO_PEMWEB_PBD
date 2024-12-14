const parallax_el = document.querySelectorAll(".parallax");

let xValues = 0,
    yValues = 0;

    
let rotateDegrees = 0;    

    window.addEventListener("mousemove", (e) => {
        let xValues = e.clientX - window.innerWidth / 2;
        let yValues = e.clientY - window.innerHeight / 2;

        let zValues = 100;
    
        document.querySelectorAll(".parallax").forEach(el => {
            let speedx = el.dataset.speedx;
            let speedy = el.dataset.speedy;
            el.style.transform = `translateX(calc(-50% + ${-xValues * speedx}px)) translateY(calc(-50% + ${yValues * speedy}px)) translateZ(${zValues}px)`;
        });
        textElement.style.transform = `translate(-50%, -50%)`;
    });