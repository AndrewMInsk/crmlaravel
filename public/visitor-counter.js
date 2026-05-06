(function() {
    // Функция для определения типа устройства
    function getDeviceType() {
        const userAgent = navigator.userAgent.toLowerCase();
        if (/mobile|android|iphone|ipad|ipod|blackberry|windows phone/.test(userAgent)) {
            return 'Mobile';
        } else if (/tablet/.test(userAgent)) {
            return 'Tablet';
        } else {
            return 'Desktop';
        }
    }

    // Функция для получения IP и города через ipapi.co
    function getIpAndCity() {
        return fetch('https://ipapi.co/json/')
            .then(response => response.json())
            .then(data => {
                return {
                    ip: data.ip || 'Unknown',
                    city: data.city || 'Unknown'
                };
            })
            .catch(error => {
                console.error('Ошибочка:', error);
                return {
                    ip: 'Unknown',
                    city: 'Unknown'
                };
            });
    }

    // Функция для отправки данных на сервер
    function sendVisitData(data) {
        const apiUrl = '/api/visits';

        fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            console.log('Визит записан:', result);
        })
        .catch(error => {
            console.error('Визи сломался:', error);
        });
    }

    // Основная функция
    function trackVisit() {
        const device = getDeviceType();

        getIpAndCity().then(locationData => {
            const visitData = {
                ip: locationData.ip,
                city: locationData.city,
                device: device
            };

            sendVisitData(visitData);
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', trackVisit);
    } else {
        trackVisit();
    }
})();