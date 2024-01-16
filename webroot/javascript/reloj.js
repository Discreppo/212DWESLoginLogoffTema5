function updateClock() {
            const clockElement = document.getElementById("clock");
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');

            const timeString = hours + 'p' + minutes + 'p' + seconds;
            const digits = timeString.split('');

            const images = digits.map(digit => '<img src="../image/' + digit + '.svg" class="number-img" alt="Número">');

            clockElement.innerHTML = images.join('');
        }

        // Actualiza el reloj cada segundo
        setInterval(updateClock, 1000);

        // Actualiza el reloj al cargar la página
        updateClock();