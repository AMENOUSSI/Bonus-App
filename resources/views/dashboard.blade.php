<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Bienvenue !!!') }}
        </h2>
    </x-slot>

    <!-- Hero Section -->
    <section class="bg-blue-900 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-bold mb-6">Bienvenue sur Light World Promotion</h1>
            <p class="text-lg mb-8">
                Nous connectons les talents et les opportunités dans un monde en constante évolution.
            </p>
            <a href="#about" class="bg-orange-500 text-white py-3 px-8 rounded-lg hover:bg-orange-600">
                En savoir plus
            </a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-12 bg-white text-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-blue-800 mb-6 text-center">À propos de nous</h2>
            <p class="text-lg text-center mb-8">
                Nous sommes une entreprise dédiée à la promotion et au soutien des talents dans divers domaines. Notre mission est de créer des connexions durables et significatives.
            </p>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-12 bg-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-6">Nos services</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-orange-500 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold mb-4">Promotion de talents</h3>
                    <p>Nous aidons à mettre en lumière les meilleurs talents dans divers domaines.</p>
                </div>
                <div class="bg-orange-500 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold mb-4">Événements</h3>
                    <p>Organisation d'événements pour connecter les professionnels et les opportunités.</p>
                </div>
                <div class="bg-orange-500 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold mb-4">Consultation</h3>
                    <p>Nous offrons des services de consultation pour aider les entreprises à réussir.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-12 bg-white text-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-blue-800 mb-6 text-center">Nous contacter</h2>
            <p class="text-center text-lg mb-8">
                Vous avez des questions ? N'hésitez pas à nous contacter !
            </p>
            <div class="flex justify-center">
                <a href="mailto:info@lightworldpromotion.com" class="bg-blue-900 text-white py-3 px-8 rounded-lg hover:bg-blue-800">
                    Contactez-nous
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
