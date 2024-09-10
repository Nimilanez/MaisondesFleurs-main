<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/Logo.png') }}" > <!-- Caminho para o favicon -->

    <title>Maison des Fleurs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 1s ease-out;
        }

        .fade-in-delayed {
            animation: fadeIn 1.2s ease-out;
        }

        .carousel-container {
            position: relative;
            overflow: hidden;
        }

        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease;
        }

        .carousel-item {
            flex: 1 0 25%; 
            box-sizing: border-box;
            padding: 1rem;
        }

        .carousel-card {
            display: flex;
            flex-direction: column;
            height: 100%;
            background: white;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            box-sizing: border-box;
        }

        .carousel-card img {
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .carousel-card h3 {
            margin-top: 1rem;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .carousel-card p {
            margin-top: 0.5rem;
            flex-grow: 1;
        }

        .carousel-control-prev,
        .carousel-control-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .carousel-control-prev {
            left: 10px;
        }

        .carousel-control-next {
            right: 10px;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            position: relative;
            max-width: 600px;
            width: 90%;
            display: flex;
            align-items: center;
        }

        .modal-content img {
            width: 50%;
            height: auto;
            object-fit: cover;
            border-radius: 8px;
        }

        .modal-content .text-content {
            margin-left: 20px;
            width: 50%;
        }

        .modal-close {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #FF2D20;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .building-image {
            width: 100%;
            height: auto;
            max-height: 300px; 
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>
<body class="bg-white font-sans antialiased">

    <!-- Navbar -->
    <nav class="bg-white p-6 shadow-md fade-in">
        <div class="container mx-auto flex justify-between items-center">
            <img src="/images/Logo.png" alt="Logo" class="w-20 h-20 fill-current">

            <ul class="flex space-x-6 text-gray-600">
                <li><a href="#" class="hover:text-gray-900">Home</a></li>
                <li><a href="{{ url('/about') }}" class="hover:text-gray-900">Sobre Nós</a></li>
                @if (Route::has('login'))
                    <li>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">Agendamentos</a>
                        @else
                            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">Cadastre-se</a>
                            @endif
                        @endauth
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <section class="relative bg-gray-100 py-20 fade-in-delayed">
    <div class="container mx-auto flex items-center justify-center relative z-10">
        <div class="text-center">
            <span class="text-sm uppercase tracking-wider text-[#4b0089]">Atendimento Exclusivo</span>
            <h1 class="text-5xl font-bold text-gray-800 mt-4">Personalize sua Experiência com a Maison des Fleurs</h1>
            <p class="text-gray-600 mt-4">Agende seu atendimento presencial e tenha uma consultoria personalizada para escolher as flores perfeitas para você.</p>
            <a href="{{ url('/dashboard') }}" class="mt-8 inline-block bg-[#764a9b] text-white px-6 py-3 rounded-full hover:bg-[#d3b0ff] transition-transform transform hover:scale-105">Agendar Agora</a>
        </div>
    </div>
    <img src="/images/predio.png" alt="Flowers" class="absolute top-0 left-0 w-full h-full object-cover opacity-20 z-0">
</section>


    <section class="py-16 bg-gray-50">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Tipos de Flores</h2>
            <p class="text-gray-600 mb-4">Descubra as variedades de flores disponíveis para atendimento presencial e personalize seus arranjos exclusivos.</p>
            <div class="carousel-container">
                <div class="carousel-inner flex">
                    <!-- Flower Card 1 -->
                    <div class="carousel-item">
                        <div class="carousel-card">
                            <img src="/images/rosa.jpg" alt="Rosas">
                            <h3 class="text-lg font-semibold">Rosas</h3>
                            <p class="text-gray-600">Elegantes e clássicas, perfeitas para todas as ocasiões.</p>
                            <button onclick="openModal('/images/rosa.jpg', 'Rosas', 'As rosas são símbolo de amor e respeito. Venha conhecer a variedade de cores e significados que essa flor oferece e encontre a combinação perfeita para expressar seus sentimentos.')" class="mt-4 block bg-[#764a9b] text-white py-2 px-4 rounded-full hover:bg-[#d3b0ff] transition">Descubra Mais</button>
                        </div>
                    </div>
                    <!-- Flower Card 2 -->
                    <div class="carousel-item">
                        <div class="carousel-card">
                            <img src="/images/orquidea.jpg" alt="Orquídeas">
                            <h3 class="text-lg font-semibold">Orquídeas</h3>
                            <p class="text-gray-600">Flor exótica e sofisticada, que encanta por sua beleza.</p>
                            <button onclick="openModal('/images/orquidea.jpg', 'Orquídeas', 'A orquídea exala sofisticação e elegância. Descubra como essa flor exótica pode se tornar o destaque em seu evento ou em um presente inesquecível.')" class="mt-4 block bg-[#f7a1e3] text-white py-2 px-4 rounded-full hover:bg-[#d3b0ff] transition">Descubra Mais</button>
                        </div>
                    </div>
                    <!-- Flower Card 3 -->
                    <div class="carousel-item">
                        <div class="carousel-card">
                            <img src="/images/tulipas.jpg" alt="Tulipas">
                            <h3 class="text-lg font-semibold">Tulipas</h3>
                            <p class="text-gray-600">Simples e elegantes, ideais para qualquer ocasião.</p>
                            <button onclick="openModal('/images/tulipas.jpg', 'Tulipas', 'Tulipas são a escolha ideal para quem busca simplicidade com um toque de elegância. Explore as diferentes cores e como cada uma pode expressar uma emoção única.')" class="mt-4 block bg-[#764a9b] text-white py-2 px-4 rounded-full hover:bg-[#d3b0ff] transition">Descubra Mais</button>
                        </div>
                    </div>
                    <!-- Flower Card 4 -->
                    <div class="carousel-item">
                        <div class="carousel-card">
                            <img src="/images/girassol.jpg" alt="Girassóis">
                            <h3 class="text-lg font-semibold">Girassóis</h3>
                            <p class="text-gray-600">Vibrantes e alegres, trazem calor e felicidade.</p>
                            <button onclick="openModal('/images/girassol.jpg', 'Girassóis', 'Com suas cores vibrantes, os girassóis trazem alegria e energia. Descubra como essa flor pode transformar qualquer ambiente com seu brilho radiante.')" class="mt-4 block bg-[#f7a1e3] text-white py-2 px-4 rounded-full hover:bg-[#d3b0ff] transition">Descubra Mais</button>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" onclick="moveCarousel(-1)">&#10094;</button>
                <button class="carousel-control-next" onclick="moveCarousel(1)">&#10095;</button>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="flowerModal" class="modal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeModal()">&times;</button>
            <img id="modalImage" src="" alt="Flor" class="w-1/2 h-48 object-cover rounded-lg">
            <div class="text-content ml-6">
                <h3 id="modalTitle" class="text-xl font-semibold mb-2"></h3>
                <p id="modalDescription" class="text-gray-600"></p>
            </div>
        </div>
    </div>

    <!-- Nosso Compromisso Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto text-center fade-in">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Nosso Compromisso</h2>
            <p class="text-gray-600 mb-8">Na Maison des Fleurs, temos o compromisso de proporcionar uma experiência excepcional a cada cliente. Nossa equipe dedicada está aqui para garantir que sua escolha de flores seja perfeita e atenda a todas suas expectativas. Acreditamos que cada detalhe importa e trabalhamos com paixão para oferecer um atendimento personalizado e de alta qualidade.</p>
            <div class="flex justify-center gap-4">
                <img src="/images/predio.png" alt="Compromisso" class="building-image">
                <img src="/images/predio2.jpg" alt="Compromisso" class="building-image">
            </div>
        </div>
    </section>

    <!-- Clientes Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto text-center fade-in-delayed">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">O Que Nossos Clientes Dizem</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="/images/cliente.jpg" alt="Customer" class="w-20 h-20 rounded-full mx-auto mb-4">
                    <h3 class="text-lg font-semibold">Ana Souza</h3>
                    <p class="text-gray-600">"A Maison des Fleurs transformou minha experiência de compra de flores. O atendimento personalizado foi excepcional e as recomendações feitas foram perfeitas para o evento que eu estava organizando. Sem dúvida, voltarei a comprar aqui!"</p>
                </div>
                <!-- Outros depoimentos -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#764a9b] py-6">
        <div class="container mx-auto text-center text-white fade-in">
            <p>&copy; 2024 Maison des Fleurs. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script>
        let currentIndex = 0;

        function moveCarousel(direction) {
            const items = document.querySelectorAll('.carousel-item');
            const totalItems = items.length;
            const itemsPerPage = 4;
            currentIndex = (currentIndex + direction + totalItems) % totalItems;
            const offset = -currentIndex * (100 / itemsPerPage);
            document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
        }

        function openModal(imageSrc, title, description) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modalDescription').innerText = description;
            document.getElementById('flowerModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('flowerModal').style.display = 'none';
        }
    </script>
</body>
</html>
