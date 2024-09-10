<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/Logo.png') }}" > <!-- Caminho para o favicon -->

    <title>Maison des Fleurs</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background-image: url('{{ asset('images/fundo-floral.jpeg') }}');
            background-size: cover; /* Ajusta a imagem para cobrir a tela toda */
            background-position: center; /* Centraliza a imagem de fundo */
            background-repeat: no-repeat; /* Evita a repetição da imagem */
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Fundo branco semitransparente para destacar o conteúdo */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .team {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }
        .person {
            flex: 1;
            margin: 0 10px;
            text-align: center;
        }
        .person img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 15px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        }
        .person h2 {
            color: #555;
        }
        .person p {
            color: #777;
            font-size: 16px;
        }
        .person a {
            display: inline-block;
            margin-top: 10px;
            color: #3498db;
            text-decoration: none;
        }
    
    </style>
</head>
<body>
            <!-- Navbar -->
    <nav class="bg-white p-6 shadow-md fade-in">
        <div class="container1 mx-auto flex justify-between items-center">
            <img src="/images/Logo.png" alt="Logo" class="w-20 h-20 fill-current">

            <ul class="flex space-x-6 text-gray-600">
                <li><a href="{{ url('/') }}" class="hover:text-gray-900">Home</a></li>
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



    <div class="container">

        <h1>Sobre Nós</h1>
        <div class="team">
            <!-- Pessoa 1 -->
            <div class="person">
                <img src="{{ asset('images/pessoa1.jpeg') }}" alt="Foto da Pessoa 1">
                <h2>Isabelle Gomes</h2>
                <p>
                Aluna do 3º ano do Ensino Médio na ETEC Zona Leste, trabalhar no desenvolvimento do site para uma floricultura tem sido uma experiência enriquecedora e inspiradora. A criação deste site envolveu uma série de desafios e oportunidades.
                </p>
            </div>

            <!-- Pessoa 2 -->
            <div class="person">
                <img src="{{ asset('images/pessoa2.jpeg') }}" alt="Foto da Pessoa 2">
                <h2>Nicole Milanez</h2>
                <p>
                    Aluna do 3º ano do Ensino Médio na ETEC Zona Leste, trabalhar em um objetivo para criar um ambiente online que não apenas destaque a beleza e variedade das flores, mas também ofereça uma experiência de compra intuitiva e agradável. 
                </p>
            </div>
        </div>
    </div>
</body>
</html>
