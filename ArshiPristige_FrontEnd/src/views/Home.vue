<template>
  <!-- Hero Section -->
  <section class="hero-section h-screen flex items-center bg-gray-900">
    <div class="container mx-auto px-4 text-center text-white">
      <h1 class="text-5xl md:text-6xl font-bold mb-6">Créons ensemble votre espace de rêve</h1>
      <p class="text-xl mb-8 max-w-3xl mx-auto">ArshiPristige Concept - Votre partenaire en architecture d'intérieur pour des projets d'excellence à Casablanca et au Maroc.</p>
      <div class="flex flex-col md:flex-row justify-center gap-4">
        <router-link :to="'/contact'" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded-full transition duration-300">Demander un Devis</router-link>
        <router-link :to="'/projets'" class="bg-transparent hover:bg-white hover:text-gray-900 text-white font-bold py-3 px-8 border-2 border-white rounded-full transition duration-300">Voir Nos Projets</router-link>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <span class="text-gray-600 font-medium">Nos Services</span>
        <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Excellence en Architecture d'Intérieur</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Nous transformons vos idées en espaces magnifiques et fonctionnels, en créant des environnements qui reflètent votre style et répondent à vos besoins.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="service-card bg-white p-8 rounded-lg shadow-md text-center border border-gray-100">
          <div class="w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center text-2xl mx-auto mb-4">
            <i class="fas fa-pencil-ruler"></i>
          </div>
          <h3 class="text-xl font-bold mb-3 text-gray-800">Conception & Design</h3>
          <p class="text-gray-600">Création de plans détaillés et de concepts design personnalisés pour votre espace.</p>
          <router-link :to="'/services'" class="inline-block mt-4 text-gray-800 hover:text-gray-600 transition-colors">En savoir plus →</router-link>
        </div>

        <div class="service-card bg-white p-8 rounded-lg shadow-md text-center border border-gray-100">
          <div class="w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center text-2xl mx-auto mb-4">
            <i class="fas fa-home"></i>
          </div>
          <h3 class="text-xl font-bold mb-3 text-gray-800">Rénovation Complète</h3>
          <p class="text-gray-600">Transformation complète de votre espace, de la conception à la réalisation finale.</p>
          <router-link :to="'/services'" class="inline-block mt-4 text-gray-800 hover:text-gray-600 transition-colors">En savoir plus →</router-link>
        </div>

        <div class="service-card bg-white p-8 rounded-lg shadow-md text-center border border-gray-100">
          <div class="w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center text-2xl mx-auto mb-4">
            <i class="fas fa-couch"></i>
          </div>
          <h3 class="text-xl font-bold mb-3 text-gray-800">Décoration & Aménagement</h3>
          <p class="text-gray-600">Sélection de mobilier et d'accessoires pour créer une ambiance harmonieuse.</p>
          <router-link :to="'/services'" class="inline-block mt-4 text-gray-800 hover:text-gray-600 transition-colors">En savoir plus →</router-link>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div>
          <img src="/images/static/image3.jpg" alt="ArshiPristige Concept" class="rounded-lg shadow-lg">
        </div>
        <div>
          <span class="text-gray-600 font-medium">À Propos</span>
          <h2 class="text-4xl font-bold mt-2 mb-6 text-gray-800">ArshiPristige Concept - Excellence en Architecture d'Intérieur</h2>
          <p class="text-gray-600 mb-6">Basée à Casablanca, notre agence spécialisée en architecture d'intérieur crée des espaces uniques qui allient esthétique, fonctionnalité et confort.</p>
          <p class="text-gray-600 mb-8">Notre équipe d'experts travaille en étroite collaboration avec vous pour transformer vos rêves en réalité, en respectant votre budget et vos délais.</p>
          <div class="grid grid-cols-2 gap-4 mb-8">
            <div class="flex items-center">
              <div class="w-12 h-12 bg-gray-800 text-white rounded-full flex items-center justify-center text-xl mr-4">
                <i class="fas fa-building"></i>
              </div>
              <div>
                <h4 class="font-bold text-gray-800">Projets Réalisés</h4>
                <p class="text-gray-600 text-sm">+150 projets</p>
              </div>
            </div>
            <div class="flex items-center">
              <div class="w-12 h-12 bg-gray-800 text-white rounded-full flex items-center justify-center text-xl mr-4">
                <i class="fas fa-users"></i>
              </div>
              <div>
                <h4 class="font-bold text-gray-800">Clients Satisfaits</h4>
                <p class="text-gray-600 text-sm">+120 clients</p>
              </div>
            </div>
            <div class="flex items-center">
              <div class="w-12 h-12 bg-gray-800 text-white rounded-full flex items-center justify-center text-xl mr-4">
                <i class="fas fa-calendar-alt"></i>
              </div>
              <div>
                <h4 class="font-bold text-gray-800">Expérience</h4>
                <p class="text-gray-600 text-sm">+8 années</p>
              </div>
            </div>
            <div class="flex items-center">
              <div class="w-12 h-12 bg-gray-800 text-white rounded-full flex items-center justify-center text-xl mr-4">
                <i class="fas fa-award"></i>
              </div>
              <div>
                <h4 class="font-bold text-gray-800">Certifications</h4>
                <p class="text-gray-600 text-sm">Professionnels certifiés</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Section -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <span class="text-gray-600 font-medium">Notre Portfolio</span>
        <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Projets Récents</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Découvrez quelques-uns de nos projets d'architecture d'intérieur réalisés à Casablanca et dans tout le Maroc.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="project-card bg-white rounded-lg shadow-md overflow-hidden border border-gray-100">
          <img src="/images/static/image4.jpg" alt="Projet Résidentiel" class="w-full h-48 object-cover">
          <div class="p-6">
            <h3 class="text-xl font-bold mb-2 text-gray-800">Appartement Moderne</h3>
            <p class="text-gray-600 mb-4">Rénovation complète d'un appartement 3 pièces avec design contemporain.</p>
            <div class="flex justify-between items-center">
              <span class="text-sm text-gray-500">Casablanca</span>
              <router-link :to="'/projets/1'" class="text-gray-800 hover:text-gray-600 transition-colors">Voir plus →</router-link>
            </div>
          </div>
        </div>

        <div class="project-card bg-white rounded-lg shadow-md overflow-hidden border border-gray-100">
          <img src="/images/static/image5.jpg" alt="Projet Commercial" class="w-full h-48 object-cover">
          <div class="p-6">
            <h3 class="text-xl font-bold mb-2 text-gray-800">Boutique Élégante</h3>
            <p class="text-gray-600 mb-4">Conception d'une boutique de mode avec espace d'exposition optimisé.</p>
            <div class="flex justify-between items-center">
              <span class="text-sm text-gray-500">Rabat</span>
              <router-link :to="'/projets/2'" class="text-gray-800 hover:text-gray-600 transition-colors">Voir plus →</router-link>
            </div>
          </div>
        </div>

        <div class="project-card bg-white rounded-lg shadow-md overflow-hidden border border-gray-100">
          <img src="/images/static/image6.jpg" alt="Projet Villa" class="w-full h-48 object-cover">
          <div class="p-6">
            <h3 class="text-xl font-bold mb-2 text-gray-800">Villa de Luxe</h3>
            <p class="text-gray-600 mb-4">Aménagement intérieur d'une villa de 400m² avec style méditerranéen.</p>
            <div class="flex justify-between items-center">
              <span class="text-sm text-gray-500">Marrakech</span>
              <router-link :to="'/projets/3'" class="text-gray-800 hover:text-gray-600 transition-colors">Voir plus →</router-link>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-10">
        <router-link :to="'/projets'" class="inline-flex items-center text-gray-800 hover:text-gray-600 font-medium transition-colors">
          Voir tous nos projets <i class="fas fa-arrow-right ml-2"></i>
        </router-link>
      </div>
    </div>
  </section>

  <!-- Process Section -->
  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <span class="text-gray-600 font-medium">Notre Processus</span>
        <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Comment nous travaillons</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Un processus simple et transparent pour réaliser votre projet d'architecture d'intérieur.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div class="text-center">
          <div class="w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center text-2xl mx-auto mb-4">
            <span class="font-bold">1</span>
          </div>
          <h3 class="text-lg font-bold mb-2 text-gray-800">Consultation</h3>
          <p class="text-gray-600">Première rencontre pour comprendre vos besoins et votre vision.</p>
        </div>

        <div class="text-center">
          <div class="w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center text-2xl mx-auto mb-4">
            <span class="font-bold">2</span>
          </div>
          <h3 class="text-lg font-bold mb-2 text-gray-800">Conception</h3>
          <p class="text-gray-600">Création des plans et du concept design personnalisé.</p>
        </div>

        <div class="text-center">
          <div class="w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center text-2xl mx-auto mb-4">
            <span class="font-bold">3</span>
          </div>
          <h3 class="text-lg font-bold mb-2 text-gray-800">Validation</h3>
          <p class="text-gray-600">Présentation et ajustement du projet selon vos retours.</p>
        </div>

        <div class="text-center">
          <div class="w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center text-2xl mx-auto mb-4">
            <span class="font-bold">4</span>
          </div>
          <h3 class="text-lg font-bold mb-2 text-gray-800">Réalisation</h3>
          <p class="text-gray-600">Exécution du projet avec suivi qualité rigoureux.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact CTA Section -->
  <section class="py-16 bg-gray-800 text-white">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-4xl font-bold mb-4">Prêt à transformer votre espace ?</h2>
      <p class="text-xl mb-8 max-w-2xl mx-auto">Contactez-nous pour discuter de votre projet et obtenir un devis personnalisé.</p>
      <div class="flex flex-col md:flex-row justify-center gap-4">
        <router-link :to="'/contact'" class="bg-white text-gray-800 hover:bg-gray-100 font-bold py-3 px-8 rounded-full transition duration-300">
          Demander un Devis
        </router-link>
        <a href="tel:0669012146" class="bg-transparent hover:bg-white hover:text-gray-800 text-white font-bold py-3 px-8 border-2 border-white rounded-full transition duration-300">
          <i class="fas fa-phone mr-2"></i>06 69 01 21 46
        </a>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'Home',
  components: {},
};
</script>

<style>
.hero-section {
  background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/images/static/image3.jpg');
  background-size: cover;
  background-position: center;
}

.service-card:hover {
  box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
  transform: translateY(-5px);
  transition: all 0.3s ease;
}

.project-card:hover {
  box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
  transform: translateY(-5px);
  transition: all 0.3s ease;
}
</style>
