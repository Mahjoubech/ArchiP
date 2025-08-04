<template>
  <div class="bg-white">
    <!-- Hero Section -->
    <section class="py-20 bg-gray-50">
      <div class="container mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold text-gray-800 mb-6">Nos Services</h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Découvrez notre gamme complète de services en architecture d'intérieur, 
          de la conception initiale à la réalisation finale de votre projet.
        </p>
      </div>
    </section>

    <!-- Main Services -->
    <section class="py-16">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Service 1: Conception & Design -->
          <div class="service-card bg-white p-8 rounded-lg shadow-lg border border-gray-100">
            <div class="w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center text-2xl mx-auto mb-6">
              <i class="fas fa-pencil-ruler"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Conception & Design</h3>
            <p class="text-gray-600 mb-6 text-center">
              Création de plans détaillés et de concepts design personnalisés pour transformer votre espace selon vos besoins et votre style.
            </p>
            <ul class="text-gray-600 space-y-2 mb-6">
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Plans d'aménagement détaillés
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Rendu 3D photoréaliste
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Sélection de matériaux
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Palette de couleurs harmonieuse
              </li>
            </ul>
            <div class="text-center">
              <router-link :to="'/contact'" class="inline-block bg-gray-800 text-white px-6 py-3 rounded-full hover:bg-gray-700 transition-colors">
                Demander un Devis
              </router-link>
            </div>
          </div>

          <!-- Service 2: Rénovation Complète -->
          <div class="service-card bg-white p-8 rounded-lg shadow-lg border border-gray-100">
            <div class="w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center text-2xl mx-auto mb-6">
              <i class="fas fa-home"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Rénovation Complète</h3>
            <p class="text-gray-600 mb-6 text-center">
              Transformation complète de votre espace, de la démolition à la finition, avec un suivi rigoureux de chaque étape.
            </p>
            <ul class="text-gray-600 space-y-2 mb-6">
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Démolition et préparation
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Travaux de maçonnerie
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Installation électrique et plomberie
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Finitions et décoration
              </li>
            </ul>
            <div class="text-center">
              <router-link :to="'/contact'" class="inline-block bg-gray-800 text-white px-6 py-3 rounded-full hover:bg-gray-700 transition-colors">
                Demander un Devis
              </router-link>
            </div>
          </div>

          <!-- Service 3: Décoration & Aménagement -->
          <div class="service-card bg-white p-8 rounded-lg shadow-lg border border-gray-100">
            <div class="w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center text-2xl mx-auto mb-6">
              <i class="fas fa-couch"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Décoration & Aménagement</h3>
            <p class="text-gray-600 mb-6 text-center">
              Sélection de mobilier, accessoires et éléments décoratifs pour créer une ambiance harmonieuse et fonctionnelle.
            </p>
            <ul class="text-gray-600 space-y-2 mb-6">
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Sélection de mobilier
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Choix d'accessoires décoratifs
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Éclairage d'accent
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Textiles et rideaux
              </li>
            </ul>
            <div class="text-center">
              <router-link :to="'/contact'" class="inline-block bg-gray-800 text-white px-6 py-3 rounded-full hover:bg-gray-700 transition-colors">
                Demander un Devis
              </router-link>
            </div>
          </div>

          <!-- Service 4: Design d'Intérieur -->
          <div class="service-card bg-white p-8 rounded-lg shadow-lg border border-gray-100">
            <div class="w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center text-2xl mx-auto mb-6">
              <i class="fas fa-palette"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Design d'Intérieur</h3>
            <p class="text-gray-600 mb-6 text-center">
              Création d'espaces uniques qui reflètent votre personnalité tout en optimisant fonctionnalité et esthétique.
            </p>
            <ul class="text-gray-600 space-y-2 mb-6">
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Analyse des besoins
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Concept design personnalisé
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Optimisation de l'espace
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Conseils en décoration
              </li>
            </ul>
            <div class="text-center">
              <router-link :to="'/contact'" class="inline-block bg-gray-800 text-white px-6 py-3 rounded-full hover:bg-gray-700 transition-colors">
                Demander un Devis
              </router-link>
            </div>
          </div>

          <!-- Service 5: Consultation -->
          <div class="service-card bg-white p-8 rounded-lg shadow-lg border border-gray-100">
            <div class="w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center text-2xl mx-auto mb-6">
              <i class="fas fa-comments"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Consultation</h3>
            <p class="text-gray-600 mb-6 text-center">
              Expertise et conseils personnalisés pour optimiser votre espace et prendre les bonnes décisions pour votre projet.
            </p>
            <ul class="text-gray-600 space-y-2 mb-6">
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Évaluation de l'espace
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Recommandations personnalisées
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Estimation budgétaire
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Planning de réalisation
              </li>
            </ul>
            <div class="text-center">
              <router-link :to="'/contact'" class="inline-block bg-gray-800 text-white px-6 py-3 rounded-full hover:bg-gray-700 transition-colors">
                Demander un Devis
              </router-link>
            </div>
          </div>

          <!-- Service 6: Suivi de Chantier -->
          <div class="service-card bg-white p-8 rounded-lg shadow-lg border border-gray-100">
            <div class="w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center text-2xl mx-auto mb-6">
              <i class="fas fa-hard-hat"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Suivi de Chantier</h3>
            <p class="text-gray-600 mb-6 text-center">
              Accompagnement complet pendant toute la durée des travaux pour garantir qualité et respect des délais.
            </p>
            <ul class="text-gray-600 space-y-2 mb-6">
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Coordination des artisans
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Contrôle qualité
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Respect des délais
              </li>
              <li class="flex items-center">
                <i class="fas fa-check text-gray-800 mr-2"></i>
                Réception des travaux
              </li>
            </ul>
            <div class="text-center">
              <router-link :to="'/contact'" class="inline-block bg-gray-800 text-white px-6 py-3 rounded-full hover:bg-gray-700 transition-colors">
                Demander un Devis
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Process Section -->
    <section class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <h2 class="text-4xl font-bold text-gray-800 mb-4">Notre Processus de Travail</h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Un processus simple et transparent pour réaliser votre projet d'architecture d'intérieur en toute sérénité.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
          <div class="text-center">
            <div class="w-20 h-20 bg-gray-800 text-white rounded-full flex items-center justify-center text-3xl mx-auto mb-6">
              <span class="font-bold">1</span>
            </div>
            <h3 class="text-xl font-bold mb-4 text-gray-800">Consultation Initiale</h3>
            <p class="text-gray-600">Première rencontre pour comprendre vos besoins, votre style et votre budget.</p>
          </div>

          <div class="text-center">
            <div class="w-20 h-20 bg-gray-800 text-white rounded-full flex items-center justify-center text-3xl mx-auto mb-6">
              <span class="font-bold">2</span>
            </div>
            <h3 class="text-xl font-bold mb-4 text-gray-800">Conception & Plans</h3>
            <p class="text-gray-600">Création des plans détaillés et du concept design personnalisé.</p>
          </div>

          <div class="text-center">
            <div class="w-20 h-20 bg-gray-800 text-white rounded-full flex items-center justify-center text-3xl mx-auto mb-6">
              <span class="font-bold">3</span>
            </div>
            <h3 class="text-xl font-bold mb-4 text-gray-800">Validation & Ajustements</h3>
            <p class="text-gray-600">Présentation du projet et ajustements selon vos retours et préférences.</p>
          </div>

          <div class="text-center">
            <div class="w-20 h-20 bg-gray-800 text-white rounded-full flex items-center justify-center text-3xl mx-auto mb-6">
              <span class="font-bold">4</span>
            </div>
            <h3 class="text-xl font-bold mb-4 text-gray-800">Réalisation & Suivi</h3>
            <p class="text-gray-600">Exécution du projet avec suivi qualité rigoureux et respect des délais.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gray-800 text-white">
      <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-4">Prêt à transformer votre espace ?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
          Contactez-nous pour discuter de votre projet et obtenir un devis personnalisé gratuit.
        </p>
        <div class="flex flex-col md:flex-row justify-center gap-4">
          <router-link :to="'/contact'" class="bg-white text-gray-800 hover:bg-gray-100 font-bold py-3 px-8 rounded-full transition duration-300">
            Demander un Devis Gratuit
          </router-link>
          <a href="tel:0669012146" class="bg-transparent hover:bg-white hover:text-gray-800 text-white font-bold py-3 px-8 border-2 border-white rounded-full transition duration-300">
            <i class="fas fa-phone mr-2"></i>06 69 01 21 46
          </a>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: 'Services',
  metaInfo: {
    title: 'Services - ArshiPristige Concept',
    meta: [
      { name: 'description', content: 'Découvrez nos services d\'architecture d\'intérieur à Casablanca. Conception, rénovation, décoration et suivi de chantier.' }
    ]
  }
};
</script>

<style scoped>
.service-card:hover {
  box-shadow: 0 20px 40px -3px rgba(0, 0, 0, 0.1), 0 10px 20px -2px rgba(0, 0, 0, 0.05);
  transform: translateY(-5px);
  transition: all 0.3s ease;
}
</style> 