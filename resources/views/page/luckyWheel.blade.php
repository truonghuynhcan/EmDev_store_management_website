<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <style>
            body {
                background-color: #333;
            }

            .header {
                padding: 40px;
                color: #fff;
                margin: 0 auto;
                margin-bottom: 40px;
            }

            .header h1,
            p {
                text-align: center;
            }

            .wheel {
                display: flex;
                justify-content: center;
                position: relative;
            }

            .center-circle {
                width: 100px;
                height: 100px;
                border-radius: 60px;
                background-color: #fff;
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                cursor: pointer;
            }

            .triangle {
                width: 0;
                height: 0;
                border-top: 10px solid transparent;
                border-bottom: 10px solid transparent;
                border-right: 30px solid white;
                position: absolute;
                top: 50%;
                right: -220%;
                transform: translateY(-50%);
            }

            textarea {
                background-color: rgba(20, 20, 20, 0.2);
                caret-color: #fff;
                resize: none;
                color: #fff;
            }

            .inputArea {
                display: flex;
                justify-content: center;
                margin-top: 40px;
            }
        </style>
    </head>

    <body>
        <div class="header">
            <h1>Vòng quay may mắn</h1>
        </div>
        <div class="wheel">
            <canvas id="canvas" width="500" height="500"></canvas>
            <div class="center-circle" onclick="spin()">
                <div class="triangle"></div>
            </div>
        </div>
        <div class=" container text-end">
            <a href="{{route('home')}}">Bỏ qua lượt quay</a>
        </div>
        <div class="inputArea" onchange="createWheel()" style="display: none;">
            <textarea rows="20" cols="30">May mắn lần sau
Móc khóa
Stiker
May mắn lần sau
Móc khóa
Stiker
May mắn lần sau
Móc khóa
Stiker  
May mắn lần sau
Móc khóa
Stiker
May mắn lần sau
Móc khóa
Stiker  
Gấu bông
        </textarea>
        </div>
        <!-- Button trigger modal -->
        <button type="button" id="launchButton" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Hiện thông báo
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Em<span class="text-primary">Dev</span> CẢM ƠN QUÝ KHÁCH</h1>
                    </div>
                    <div class="modal-body">
                        Chúc mừng bạn nhận được
                        <h3 class="text-primary" id="gift">Chúc bạn may mắn lần sau</h3>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('updateLuckyResult') }}" method="post">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ $id_order }}">
                            <input type="hidden" name="gift" id="igift">
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            let items = [];
            let probabilities = [];
            let itemDegs = {};
            let currentDeg = 0;
            let step = 360 / items.length;

            function randomColor() {
                const r = Math.floor(Math.random() * 255);
                const g = Math.floor(Math.random() * 255);
                const b = Math.floor(Math.random() * 255);
                return {
                    r,
                    g,
                    b
                };
            }

            function toRad(deg) {
                return deg * (Math.PI / 180.0);
            }

            function randomRange(min, max) {
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }

            function easeOutSine(x) {
                return Math.sin((x * Math.PI) / 2);
            }

            function getPercent(input, min, max) {
                return (((input - min) * 100) / (max - min)) / 100;
            }


            function parseInput(input) {
                const lines = input.split("\n");
                items = [];
                lines.forEach(line => {
                    const trimmedLine = line.trim();
                    if (trimmedLine) {
                        const parts = trimmedLine.split(",");
                        let itemName = parts[0].trim();
                        if (parts.length > 1) {
                            itemName = parts[0].replace(/\d+%$/, "").trim();
                        }
                        items.push(itemName);
                    }
                });
            }

            function createWheel() {
                const textareaValue = document.getElementsByTagName("textarea")[0].value;
                parseInput(textareaValue);
                step = 360 / items.length;
                colors = [];
                for (let i = 0; i < items.length + 1; i++) {
                    colors.push(randomColor());
                }
                itemDegs = {}; // Khởi tạo lại itemDegs
                draw();
            }

            const canvas = document.getElementById("canvas");
            const ctx = canvas.getContext("2d");
            const width = document.getElementById("canvas").width;
            const height = document.getElementById("canvas").height;
            const centerX = width / 2;
            const centerY = height / 2;
            const radius = width / 2;

            function draw() {
                ctx.clearRect(0, 0, width, height);
                ctx.beginPath();
                ctx.arc(centerX, centerY, radius, toRad(0), toRad(360));
                ctx.fillStyle = `rgb(${33},${33},${33})`;
                ctx.lineTo(centerX, centerY);
                ctx.fill();

                let startDeg = currentDeg;
                for (let i = 0; i < items.length; i++, startDeg += step) {
                    let endDeg = startDeg + step;
                    const color = colors[i];
                    const colorStyle2 = `rgb(${color.r - 30},${color.g - 30},${color.b - 30})`;
                    const colorStyle = `rgb(${color.r},${color.g},${color.b})`;

                    ctx.beginPath();
                    ctx.arc(centerX, centerY, radius - 2, toRad(startDeg), toRad(endDeg));
                    ctx.fillStyle = colorStyle2;
                    ctx.lineTo(centerX, centerY);
                    ctx.fill();

                    ctx.beginPath();
                    ctx.arc(centerX, centerY, radius - 30, toRad(startDeg), toRad(endDeg));
                    ctx.fillStyle = colorStyle;
                    ctx.lineTo(centerX, centerY);
                    ctx.fill();

                    ctx.save();
                    ctx.translate(centerX, centerY);
                    ctx.rotate(toRad((startDeg + endDeg) / 2));
                    ctx.textAlign = "center";
                    ctx.fillStyle = color.r > 150 || color.g > 150 || color.b > 150 ? "#000" : "#fff";
                    ctx.font = "bold 24px serif";
                    ctx.fillText(items[i], 130, 10);
                    ctx.restore();

                    itemDegs[items[i]] = {
                        startDeg,
                        endDeg
                    };
                }
            }

            let speed = 0;
            let maxRotation = randomRange(360 * 3, 360 * 6);
            let pause = false;

            function animate() {
                if (pause) {
                    return;
                }
                speed = easeOutSine(getPercent(currentDeg, maxRotation, 0)) * 20;
                if (speed < 0.01) {
                    speed = 0;
                    pause = true;
                    const winner = determineWinner();

                    document.getElementById('launchButton').click();
                }
                currentDeg += speed;
                draw();
                window.requestAnimationFrame(animate);
            }

            function determineWinner() {
                let winner = "hi"; // giá trị mặc định
                const normalizedDeg = (currentDeg % 360 + 360) % 360;
                for (let item in itemDegs) {
                    const {
                        startDeg,
                        endDeg
                    } = itemDegs[item];
                    if (normalizedDeg >= startDeg && normalizedDeg <= endDeg) {
                        winner = item;
                        break;
                    }
                }
                return winner;
            }

            function spin() {
                if (speed !== 0) {
                    return;
                }

                maxRotation = 0;
                currentDeg = 0;
                createWheel();
                draw();

                const randomIndex = Math.floor(Math.random() * items.length);
                const selectedItem = items[randomIndex];
                document.getElementById("gift").innerText = selectedItem;
                document.getElementById("igift").value = selectedItem;
                if (itemDegs[selectedItem]) {
                    maxRotation = 360 * 6 - itemDegs[selectedItem].endDeg + 10;
                } else {
                    maxRotation = randomRange(360 * 3, 360 * 6);
                }
                itemDegs = {};
                pause = false;
                window.requestAnimationFrame(animate);
            }

            document.addEventListener("DOMContentLoaded", function() {
                createWheel();
            });
        </script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>

</html>
