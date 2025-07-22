<template>
<div class="min-h-screen bg-gray-100">
    <div class="max-w-6xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-t-xl shadow-sm border border-gray-200">
            <div class="p-6">
                <div class="flex justify-between items-start">
                    <div class="flex items-center space-x-4">
                        <div class="h-12 w-12 rounded-full bg-[#C9559B] flex items-center justify-center text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Politique de confidentialité</h1>
                            <p class="text-sm text-gray-500">Document de référence : PC-2025-03-07-001</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <button class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Télécharger PDF
                        </button>
                        <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#C9559B] hover:bg-[#B34B8B]">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                            </svg>
                            Imprimer
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <div class="mt-2 bg-white shadow-sm border border-gray-200 rounded-b-xl">
            <div class="p-8">
                <div class="mb-8 p-6 bg-gray-50 rounded-xl">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Table des matières</h2>
                    <nav class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-3">
                            <a href="#section1" class="flex items-center text-gray-600 hover:text-[#C9559B] group">
                                <span class="mr-2 w-6 h-6 flex items-center justify-center rounded-full bg-gray-200 text-sm group-hover:bg-[#C9559B] group-hover:text-white transition-colors">1</span>
                                <span>Collecte des données</span>
                            </a>
                            <a href="#section2" class="flex items-center text-gray-600 hover:text-[#C9559B] group">
                                <span class="mr-2 w-6 h-6 flex items-center justify-center rounded-full bg-gray-200 text-sm group-hover:bg-[#C9559B] group-hover:text-white transition-colors">2</span>
                                <span>Utilisation des données</span>
                            </a>
                            <a href="#section3" class="flex items-center text-gray-600 hover:text-[#C9559B] group">
                                <span class="mr-2 w-6 h-6 flex items-center justify-center rounded-full bg-gray-200 text-sm group-hover:bg-[#C9559B] group-hover:text-white transition-colors">3</span>
                                <span>Protection des données</span>
                            </a>
                            <a href="#section4" class="flex items-center text-gray-600 hover:text-[#C9559B] group">
                                <span class="mr-2 w-6 h-6 flex items-center justify-center rounded-full bg-gray-200 text-sm group-hover:bg-[#C9559B] group-hover:text-white transition-colors">4</span>
                                <span>Droits des utilisateurs</span>
                            </a>
                        </div>
                        <div class="space-y-3">
                            <a href="#section5" class="flex items-center text-gray-600 hover:text-[#C9559B] group">
                                <span class="mr-2 w-6 h-6 flex items-center justify-center rounded-full bg-gray-200 text-sm group-hover:bg-[#C9559B] group-hover:text-white transition-colors">5</span>
                                <span>Cookies et traceurs</span>
                            </a>
                            <a href="#section6" class="flex items-center text-gray-600 hover:text-[#C9559B] group">
                                <span class="mr-2 w-6 h-6 flex items-center justify-center rounded-full bg-gray-200 text-sm group-hover:bg-[#C9559B] group-hover:text-white transition-colors">6</span>
                                <span>Partage des données</span>
                            </a>
                            <a href="#section7" class="flex items-center text-gray-600 hover:text-[#C9559B] group">
                                <span class="mr-2 w-6 h-6 flex items-center justify-center rounded-full bg-gray-200 text-sm group-hover:bg-[#C9559B] group-hover:text-white transition-colors">7</span>
                                <span>Conservation des données</span>
                            </a>
                            <a href="#section8" class="flex items-center text-gray-600 hover:text-[#C9559B] group">
                                <span class="mr-2 w-6 h-6 flex items-center justify-center rounded-full bg-gray-200 text-sm group-hover:bg-[#C9559B] group-hover:text-white transition-colors">8</span>
                                <span>Contact et réclamations</span>
                            </a>
                        </div>
                    </nav>
                </div>

                <div class="space-y-12">

        <section id="section1" class="scroll-mt-16">
            <div class="flex items-center space-x-4 mb-6">
                <div class="w-10 h-10 rounded-full bg-[#C9559B]/10 flex items-center justify-center text-[#C9559B] font-semibold">
                    1
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Collecte des données</h2>
            </div>

            <div class="prose max-w-none text-gray-600">
                <div class="bg-[#C9559B]/5 border-l-4 border-[#C9559B] p-4 rounded-r-lg mb-6">
                    <p class="text-gray-900 font-medium">
                        Nous collectons uniquement les informations nécessaires au bon fonctionnement de nos services et à l'amélioration de votre expérience utilisateur.
                    </p>
                </div>

                <div class="ml-14 mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">1.1 Types de données collectées</h3>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="font-medium text-gray-900 mb-3">Données d'identification</h4>
                                <ul class="space-y-3">
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Nom et prénom</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Adresse email</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Numéro de téléphone (facultatif)</span>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900 mb-3">Données de navigation</h4>
                                <ul class="space-y-3">
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Adresse IP</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Cookies de session</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Données de connexion</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ml-14 mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">1.2 Méthodes de collecte</h3>
                    <div class="space-y-4">
                        <div class="bg-white border border-gray-200 rounded-lg p-4">
                            <h4 class="font-medium text-gray-900 mb-2">Collecte directe</h4>
                            <p class="text-gray-600">
                                Informations que vous nous fournissez directement lors de votre inscription ou de la mise à jour de votre profil.
                            </p>
                        </div>
                        <div class="bg-white border border-gray-200 rounded-lg p-4">
                            <h4 class="font-medium text-gray-900 mb-2">Collecte automatique</h4>
                            <p class="text-gray-600">
                                Données techniques collectées automatiquement lors de votre navigation sur notre plateforme.
                            </p>
                        </div>
                        <div class="bg-white border border-gray-200 rounded-lg p-4">
                            <h4 class="font-medium text-gray-900 mb-2">Collecte indirecte</h4>
                            <p class="text-gray-600">
                                Informations obtenues via des services tiers avec votre consentement préalable.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="ml-14">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">1.3 Base légale</h3>
                    <div class="bg-[#C9559B]/5 rounded-lg p-6">
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                <div>
                                    <span class="font-medium text-gray-900">Consentement explicite</span>
                                    <p class="mt-1 text-sm">Vous donnez votre accord explicite pour la collecte et le traitement de vos données.</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                <div>
                                    <span class="font-medium text-gray-900">Obligation légale</span>
                                    <p class="mt-1 text-sm">Certaines données sont collectées pour respecter nos obligations légales.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
<section id="section2" class="scroll-mt-16 border-t border-gray-200 pt-8">
    <div class="flex items-center space-x-4 mb-6">
        <div class="w-10 h-10 rounded-full bg-[#C9559B]/10 flex items-center justify-center text-[#C9559B] font-semibold">
            2
        </div>
        <h2 class="text-2xl font-bold text-gray-900">Utilisation des données</h2>
    </div>

    <div class="prose max-w-none text-gray-600">
        <div class="ml-14 mb-8">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">2.1 Finalités du traitement</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-lg p-6">
                    <h4 class="font-medium text-gray-900 mb-3">Services principaux</h4>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Gestion de votre compte</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Accès aux fonctionnalités</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Communication avec vous</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-gray-50 rounded-lg p-6">
                    <h4 class="font-medium text-gray-900 mb-3">Amélioration des services</h4>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Analyse statistique</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Optimisation de la plateforme</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Sécurité et prévention</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="ml-14 mb-8">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">2.2 Durée de conservation</h3>
            <div class="bg-[#C9559B]/5 border-l-4 border-[#C9559B] p-4 rounded-r-lg mb-6">
                <p class="text-gray-900">
                    Nous conservons vos données personnelles uniquement pendant la durée nécessaire aux finalités pour lesquelles elles ont été collectées.
                </p>
            </div>
            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <div class="space-y-4">
                    <div class="flex items-center justify-between py-3 border-b border-gray-200">
                        <span class="font-medium text-gray-900">Données du compte</span>
                        <span class="text-[#C9559B]">Durée de l'inscription + 1 an</span>
                    </div>
                    <div class="flex items-center justify-between py-3 border-b border-gray-200">
                        <span class="font-medium text-gray-900">Données de navigation</span>
                        <span class="text-[#C9559B]">13 mois maximum</span>
                    </div>
                    <div class="flex items-center justify-between py-3">
                        <span class="font-medium text-gray-900">Données de communication</span>
                        <span class="text-[#C9559B]">3 ans après le dernier contact</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="ml-14">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">2.3 Traitement automatisé</h3>
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800">Information importante</h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            <p>
                                Certaines décisions peuvent être prises de manière automatisée pour améliorer votre expérience. 
                                Vous avez le droit de demander une intervention humaine ou de contester ces décisions.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="section3" class="scroll-mt-16 border-t border-gray-200 pt-8">
    <div class="flex items-center space-x-4 mb-6">
        <div class="w-10 h-10 rounded-full bg-[#C9559B]/10 flex items-center justify-center text-[#C9559B] font-semibold">
            3
        </div>
        <h2 class="text-2xl font-bold text-gray-900">Protection des données</h2>
    </div>

    <div class="prose max-w-none text-gray-600">
        <div class="ml-14 mb-8">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">3.1 Mesures de sécurité</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center mb-3">
                        <svg class="w-6 h-6 text-[#C9559B] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        <h4 class="font-medium text-gray-900">Chiffrement</h4>
                    </div>
                    <p class="text-sm text-gray-600">
                        Toutes les données sont chiffrées en transit et au repos
                    </p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center mb-3">
                        <svg class="w-6 h-6 text-[#C9559B] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        <h4 class="font-medium text-gray-900">Authentification</h4>
                    </div>
                    <p class="text-sm text-gray-600">
                        Double authentification disponible
                    </p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center mb-3">
                        <svg class="w-6 h-6 text-[#C9559B] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h4 class="font-medium text-gray-900">Surveillance</h4>
                    </div>
                    <p class="text-sm text-gray-600">
                        Monitoring 24/7 des activités suspectes
                    </p>
                </div>
            </div>
        </div>

        <div class="ml-14 mb-8">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">3.2 Accès aux données</h3>
            <div class="bg-[#C9559B]/5 rounded-lg p-6">
                <p class="mb-4">L'accès à vos données est strictement limité :</p>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Au personnel autorisé et formé</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Aux prestataires nécessaires au service</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Aux autorités sur demande légale</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="ml-14">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">3.3 Notification des incidents</h3>
            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <p class="mb-4">
                    En cas de violation de données, nous nous engageons à :
                </p>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-8 w-8 rounded-full bg-[#C9559B] text-white">
                                1
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-gray-900">Notification rapide</p>
                            <p class="mt-1 text-sm text-gray-600">
                                Vous informer dans les 72 heures suivant la découverte
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-8 w-8 rounded-full bg-[#C9559B] text-white">
                                2
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-gray-900">Mesures correctives</p>
                            <p class="mt-1 text-sm text-gray-600">
                                Mettre en place des actions immédiates pour limiter l'impact
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-8 w-8 rounded-full bg-[#C9559B] text-white">
                                3
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-gray-900">Assistance</p>
                            <p class="mt-1 text-sm text-gray-600">
                                Vous accompagner dans les démarches nécessaires
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="section4" class="scroll-mt-16 border-t border-gray-200 pt-8">
    <div class="flex items-center space-x-4 mb-6">
        <div class="w-10 h-10 rounded-full bg-[#C9559B]/10 flex items-center justify-center text-[#C9559B] font-semibold">
            4
        </div>
        <h2 class="text-2xl font-bold text-gray-900">Droits des utilisateurs</h2>
    </div>

    <div class="prose max-w-none text-gray-600">
        <div class="ml-14 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                    <div class="bg-[#C9559B]/5 px-6 py-4">
                        <h3 class="text-lg font-semibold text-gray-900">Droits RGPD</h3>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <div>
                                    <span class="font-medium">Droit d'accès</span>
                                    <p class="text-sm mt-1">Consulter vos données personnelles</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <div>
                                    <span class="font-medium">Droit de rectification</span>
                                    <p class="text-sm mt-1">Modifier vos données inexactes</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <div>
                                    <span class="font-medium">Droit à l'effacement</span>
                                    <p class="text-sm mt-1">Supprimer vos données</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                    <div class="bg-[#C9559B]/5 px-6 py-4">
                        <h3 class="text-lg font-semibold text-gray-900">Droits complémentaires</h3>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <div>
                                    <span class="font-medium">Droit à la portabilité</span>
                                    <p class="text-sm mt-1">Récupérer vos données dans un format structuré</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <div>
                                    <span class="font-medium">Droit d'opposition</span>
                                    <p class="text-sm mt-1">Refuser le traitement de vos données</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <div>
                                    <span class="font-medium">Droit à la limitation</span>
                                    <p class="text-sm mt-1">Restreindre le traitement de vos données</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-8 bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Comment exercer vos droits ?</h3>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-8 w-8 rounded-full bg-[#C9559B] text-white">
                                1
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-gray-900">Contactez-nous</p>
                            <p class="mt-1 text-sm text-gray-600">
                                Via le formulaire de contact ou par email à privacy@benevomaroc.ma
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-8 w-8 rounded-full bg-[#C9559B] text-white">
                                2
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-gray-900">Vérification</p>
                            <p class="mt-1 text-sm text-gray-600">
                                Nous vérifions votre identité pour protéger vos données
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-8 w-8 rounded-full bg-[#C9559B] text-white">
                                3
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-gray-900">Traitement</p>
                            <p class="mt-1 text-sm text-gray-600">
                                Nous traitons votre demande sous 30 jours maximum
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="section5" class="scroll-mt-16 border-t border-gray-200 pt-8">
    <div class="flex items-center space-x-4 mb-6">
        <div class="w-10 h-10 rounded-full bg-[#C9559B]/10 flex items-center justify-center text-[#C9559B] font-semibold">
            5
        </div>
        <h2 class="text-2xl font-bold text-gray-900">Cookies et traceurs</h2>
    </div>

    <div class="ml-14 prose max-w-none text-gray-600">
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-gray-200">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Types de cookies utilisés</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-[#C9559B]/10 flex items-center justify-center">
                                <svg class="w-6 h-6 text-[#C9559B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-medium text-gray-900">Cookies essentiels</h4>
                                <p class="mt-1 text-sm">Nécessaires au fonctionnement du site</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-[#C9559B]/10 flex items-center justify-center">
                                <svg class="w-6 h-6 text-[#C9559B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-medium text-gray-900">Cookies analytiques</h4>
                                <p class="mt-1 text-sm">Mesure d'audience et performance</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-[#C9559B]/10 flex items-center justify-center">
                                <svg class="w-6 h-6 text-[#C9559B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-medium text-gray-900">Cookies de préférence</h4>
                                <p class="mt-1 text-sm">Personnalisation de l'expérience</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Gestion des cookies</h3>
                    <div class="space-y-4">
                        <p class="text-sm">
                            Vous pouvez à tout moment modifier vos préférences en matière de cookies :
                        </p>
                        <div class="space-y-2">
                            <button class="w-full flex items-center justify-between px-4 py-2 border border-[#C9559B] rounded-md hover:bg-[#C9559B]/5">
                                <span class="text-sm font-medium">Paramètres des cookies</span>
                                <svg class="w-5 h-5 text-[#C9559B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>
                        </div>
                        <p class="text-xs text-gray-500">
                            Note : La désactivation de certains cookies peut limiter votre accès à certaines fonctionnalités.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="section6" class="scroll-mt-16 border-t border-gray-200 pt-8">
    <div class="flex items-center space-x-4 mb-6">
        <div class="w-10 h-10 rounded-full bg-[#C9559B]/10 flex items-center justify-center text-[#C9559B] font-semibold">
            6
        </div>
        <h2 class="text-2xl font-bold text-gray-900">Partage des données</h2>
    </div>

    <div class="ml-14 prose max-w-none text-gray-600">
        <div class="bg-[#C9559B]/5 border-l-4 border-[#C9559B] p-4 rounded-r-lg mb-6">
            <p class="text-gray-900">
                Nous ne vendons jamais vos données personnelles. Leur partage est strictement limité et encadré.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Destinataires autorisés</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Nos sous-traitants techniques</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Les autorités compétentes (sur demande)</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Partenaires de service (avec votre accord)</span>
                    </li>
                </ul>
            </div>

            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Garanties</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Contrats de sous-traitance conformes RGPD</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Transferts hors UE encadrés</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Audits réguliers de sécurité</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="section7" class="scroll-mt-16 border-t border-gray-200 pt-8">
    <div class="flex items-center space-x-4 mb-6">
        <div class="w-10 h-10 rounded-full bg-[#C9559B]/10 flex items-center justify-center text-[#C9559B] font-semibold">
            7
        </div>
        <h2 class="text-2xl font-bold text-gray-900">Conservation des données</h2>
    </div>

    <div class="ml-14 prose max-w-none text-gray-600">
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Durées de conservation</h3>
                <div class="space-y-4">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-medium text-gray-900 mb-2">Données de compte</h4>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Durée d'activité du compte + 1 an</span>
                            <span class="text-xs text-[#C9559B]">Suppression sur demande possible</span>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-medium text-gray-900 mb-2">Données de connexion</h4>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">1 an maximum</span>
                            <span class="text-xs text-[#C9559B]">Conservation légale</span>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-medium text-gray-900 mb-2">Documents partagés</h4>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">5 ans après la fin de la relation</span>
                            <span class="text-xs text-[#C9559B]">Archivage intermédiaire</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="section8" class="scroll-mt-16 border-t border-gray-200 pt-8">
    <div class="flex items-center space-x-4 mb-6">
        <div class="w-10 h-10 rounded-full bg-[#C9559B]/10 flex items-center justify-center text-[#C9559B] font-semibold">
            8
        </div>
        <h2 class="text-2xl font-bold text-gray-900">Contact et réclamations</h2>
    </div>

<div class="ml-14 prose max-w-none text-gray-600">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Nous contacter</h3>
            <div class="space-y-4">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <div>
                        <span class="font-medium">Email</span>
                        <p class="mt-1 text-sm">privacy@benevomaroc.ma</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <div>
                        <span class="font-medium">Téléphone</span>
                        <p class="mt-1 text-sm">+212 5XX-XXXXXX</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <div>
                        <span class="font-medium">Adresse</span>
                        <p class="mt-1 text-sm">123 Rue Example, Casablanca, Maroc</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-sm rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Réclamations</h3>
            <div class="space-y-4">
                <p class="text-sm">
                    Si vous estimez que vos droits n'ont pas été respectés, vous pouvez :
                </p>
                <div class="space-y-3">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-medium text-gray-900">1. Contacter notre DPO</h4>
                        <p class="mt-1 text-sm">dpo@benevomaroc.ma</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-medium text-gray-900">2. Autorité de contrôle</h4>
                        <p class="mt-1 text-sm">CNDP - Commission Nationale de contrôle de la protection des Données à caractère Personnel</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 bg-gray-50 rounded-lg p-6">
        <div class="space-y-4">
            <div class="flex items-start">
                <svg class="w-5 h-5 text-[#C9559B] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-sm">
                    Cette politique de confidentialité peut être mise à jour. Les modifications seront publiées sur cette page avec la date de dernière mise à jour.
                </p>
            </div>
        </div>
    </div>
</div>
</section>

    </div> </div> </div></div></div>
</template>