<template>
    <div class="min-h-screen bg-gray-100">
    <div class="max-w-6xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-t-xl shadow-sm border border-gray-200">
            <div class="p-6">
                <div class="flex justify-between items-start">
                    <div class="flex items-center space-x-4">
                        <div class="h-12 w-12 rounded-full bg-[#00B3AD] flex items-center justify-center text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Conditions d'utilisation</h1>
                            <p class="text-sm text-gray-500">Document de référence : CGU-2025-03</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <button class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Télécharger PDF
                        </button>
                        <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#00B3AD] hover:bg-[#009B96]">
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
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Conditions Générales</h2>
                    <nav class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-3">
                            <a href="#section1" class="flex items-center text-gray-600 hover:text-[#00B3AD] group">
                                <span class="mr-2 w-6 h-6 flex items-center justify-center rounded-full bg-gray-200 text-sm group-hover:bg-[#00B3AD] group-hover:text-white transition-colors">1</span>
                                <span>Acceptation des conditions</span>
                            </a>
                            <a href="#section2" class="flex items-center text-gray-600 hover:text-[#00B3AD] group">
                                <span class="mr-2 w-6 h-6 flex items-center justify-center rounded-full bg-gray-200 text-sm group-hover:bg-[#00B3AD] group-hover:text-white transition-colors">2</span>
                                <span>Objet de la plateforme</span>
                            </a>
                            <a href="#section3" class="flex items-center text-gray-600 hover:text-[#00B3AD] group">
                                <span class="mr-2 w-6 h-6 flex items-center justify-center rounded-full bg-gray-200 text-sm group-hover:bg-[#00B3AD] group-hover:text-white transition-colors">3</span>
                                <span>Éligibilité et inscription</span>
                            </a>
                            <a href="#section4" class="flex items-center text-gray-600 hover:text-[#00B3AD] group">
                                <span class="mr-2 w-6 h-6 flex items-center justify-center rounded-full bg-gray-200 text-sm group-hover:bg-[#00B3AD] group-hover:text-white transition-colors">4</span>
                                <span>Responsabilités des utilisateurs</span>
                            </a>
                        </div>
                        <div class="space-y-3">
                            <a href="#section5" class="flex items-center text-gray-600 hover:text-[#00B3AD] group">
                                <span class="mr-2 w-6 h-6 flex items-center justify-center rounded-full bg-gray-200 text-sm group-hover:bg-[#00B3AD] group-hover:text-white transition-colors">5</span>
                                <span>Protection des données personnelles</span>
                            </a>
                            <a href="#section6" class="flex items-center text-gray-600 hover:text-[#00B3AD] group">
                                <span class="mr-2 w-6 h-6 flex items-center justify-center rounded-full bg-gray-200 text-sm group-hover:bg-[#00B3AD] group-hover:text-white transition-colors">6</span>
                                <span>Propriété intellectuelle</span>
                            </a>
                            <a href="#section7" class="flex items-center text-gray-600 hover:text-[#00B3AD] group">
                                <span class="mr-2 w-6 h-6 flex items-center justify-center rounded-full bg-gray-200 text-sm group-hover:bg-[#00B3AD] group-hover:text-white transition-colors">7</span>
                                <span>Suspension et résiliation</span>
                            </a>
                            <a href="#section8" class="flex items-center text-gray-600 hover:text-[#00B3AD] group">
                                <span class="mr-2 w-6 h-6 flex items-center justify-center rounded-full bg-gray-200 text-sm group-hover:bg-[#00B3AD] group-hover:text-white transition-colors">8</span>
                                <span>Modifications des conditions</span>
                            </a>
                        </div>
                    </nav>
                </div>

                <div class="space-y-12">
                    <section id="section1" class="scroll-mt-16">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-10 h-10 rounded-full bg-[#00B3AD]/10 flex items-center justify-center text-[#00B3AD] font-semibold">
                                1
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900">Acceptation des conditions</h2>
                        </div>
                        <div class="prose max-w-none text-gray-600">
                            <div class="bg-[#00B3AD]/5 border-l-4 border-[#00B3AD] p-4 rounded-r-lg mb-6">
                                <p class="text-gray-900 font-medium">
                                    En accédant et en utilisant notre plateforme, vous reconnaissez avoir lu, compris et accepté les présentes Conditions d'utilisation dans leur intégralité.
                                </p>
                            </div>
                            <p class="mb-4">
                                Ces conditions définissent les droits et obligations des utilisateurs et de la plateforme. Si vous n'acceptez pas ces conditions, vous ne devez pas utiliser nos services.
                            </p>
                            <p>
                                Nous nous réservons le droit de modifier ces conditions à tout moment. Toute modification sera notifiée aux utilisateurs et leur utilisation continue de la plateforme après ces modifications vaudra acceptation des nouvelles conditions.
                            </p>
                        </div>
                    </section>

                    <section id="section2" class="scroll-mt-16 border-t border-gray-200 pt-8">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-10 h-10 rounded-full bg-[#00B3AD]/10 flex items-center justify-center text-[#00B3AD] font-semibold">
                                2
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900">Objet de la plateforme</h2>
                        </div>
                        <div class="prose max-w-none text-gray-600">
                            <p class="mb-4">
                                Notre plateforme a pour but de fournir aux associations un espace numérique pour s'inscrire, gérer leurs informations et accéder à divers services.
                            </p>
                            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                                <p class="font-medium text-gray-900">
                                    Nous nous engageons à offrir un environnement sécurisé et performant, mais nous ne garantissons pas l'absence de dysfonctionnements ou d'interruptions de service.
                                </p>
                            </div>
                        </div>
                    </section>

                    <section id="section3" class="scroll-mt-16 border-t border-gray-200 pt-8">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-10 h-10 rounded-full bg-[#00B3AD]/10 flex items-center justify-center text-[#00B3AD] font-semibold">
                                3
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900">Éligibilité et inscription</h2>
                        </div>

                        <div class="ml-14 mb-8">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">3.1 Conditions d'inscription</h3>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <ul class="space-y-4 text-gray-600">
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Avoir l'autorité légale pour représenter l'association que vous inscrivez.</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Fournir des informations exactes, complètes et à jour.</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Accepter nos Conditions d'utilisation et notre Politique de confidentialité.</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Disposer d'un statut légal d'association reconnu au Maroc.</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Être en mesure de fournir les documents officiels demandés.</span>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="mt-6 bg-[#00B3AD]/5 border-l-4 border-[#00B3AD] p-4 rounded-r-lg">
                                <p class="text-sm text-gray-600">
                                    <span class="font-medium text-gray-900">Note importante :</span> 
                                    Toute fausse déclaration ou omission volontaire pourra entraîner la suspension immédiate 
                                    du compte et des poursuites légales le cas échéant.
                                </p>
                            </div>
                        
                            <div class="mt-6 flex items-center p-4 bg-yellow-50 rounded-lg">
                                <svg class="w-6 h-6 text-yellow-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                <p class="text-sm text-yellow-700">
                                    Les associations en cours de création peuvent créer un compte provisoire, mais devront 
                                    fournir les documents officiels dans un délai de 30 jours.
                                </p>
                            </div>
                        
                            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="border border-gray-200 rounded-lg p-4">
                                    <h4 class="text-sm font-semibold text-gray-900 mb-2">Documents requis :</h4>
                                    <ul class="text-sm text-gray-600 space-y-2">
                                        <li class="flex items-center">
                                            <svg class="w-4 h-4 text-[#00B3AD] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Récépissé de déclaration
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="w-4 h-4 text-[#00B3AD] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Statuts de l'association
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="w-4 h-4 text-[#00B3AD] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            PV dernière AG
                                        </li>
                                    </ul>
                                </div>
                                <div class="border border-gray-200 rounded-lg p-4">
                                    <h4 class="text-sm font-semibold text-gray-900 mb-2">Délais de traitement :</h4>
                                    <ul class="text-sm text-gray-600 space-y-2">
                                        <li class="flex items-center">
                                            <svg class="w-4 h-4 text-[#00B3AD] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Validation initiale : 24-48h
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="w-4 h-4 text-[#00B3AD] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Vérification complète : 5 jours
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        
                        </div>

                        <div class="ml-14 mb-8">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">3.2 Vérification des informations</h3>
                            <div class="prose max-w-none text-gray-600">
                                <p class="mb-4">
                                    Nous pouvons procéder à une vérification des informations fournies lors de l'inscription. En cas d'informations erronées, nous nous réservons le droit de refuser l'inscription ou de suspendre le compte.
                                </p>
                            </div>
                        </div>

                        <div class="ml-14">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">3.3 Sécurité du compte</h3>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <ul class="space-y-4 text-gray-600">
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Vous êtes responsable de la confidentialité de vos identifiants de connexion.</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Toute activité réalisée depuis votre compte sera considérée comme effectuée par vous.</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>En cas de suspicion d'une utilisation frauduleuse de votre compte, vous devez nous en informer immédiatement.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <section id="section4" class="scroll-mt-16 border-t border-gray-200 pt-8">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-10 h-10 rounded-full bg-[#00B3AD]/10 flex items-center justify-center text-[#00B3AD] font-semibold">
                                4
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900">Responsabilités des utilisateurs</h2>
                        </div>

                        <div class="ml-14 mb-8">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">4.1 Exactitude des informations</h3>
                            <div class="prose max-w-none text-gray-600">
                                <p>
                                    Vous devez vous assurer que toutes les informations fournies sont correctes et à jour. Toute tentative de tromperie pourra entraîner la suspension de votre compte.
                                </p>
                            </div>
                        </div>

                        <div class="ml-14 mb-8">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">4.2 Utilisation légale et respectueuse</h3>
                            <div class="bg-[#00B3AD]/5 border-l-4 border-[#00B3AD] p-4 rounded-r-lg mb-6">
                                <p class="text-gray-900 font-medium">Il est strictement interdit de :</p>
                            </div>
                            <ul class="space-y-4 text-gray-600 pl-4">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-red-500 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    <span>Utiliser la plateforme pour des activités illégales ou frauduleuses.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-red-500 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    <span>Publier du contenu offensant, diffamatoire, discriminatoire ou violent.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-red-500 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    <span>Violer les droits de propriété intellectuelle d'autrui.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-red-500 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    <span>Perturber le bon fonctionnement de la plateforme (piratage, injection de code malveillant, etc.).</span>
                                </li>
                            </ul>
                        </div>

                        <div class="ml-14">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">4.3 Conséquences en cas de non-respect</h3>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <p class="text-gray-900 font-medium mb-4">En cas de violation des règles ci-dessus, nous nous réservons le droit de :</p>
                                <ul class="space-y-4 text-gray-600">
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Supprimer le contenu litigieux.</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Suspendre temporairement ou définitivement votre compte.</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Engager des actions légales si nécessaire.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </section>
                    
                    <section id="section5" class="scroll-mt-16 border-t border-gray-200 pt-8">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-10 h-10 rounded-full bg-[#00B3AD]/10 flex items-center justify-center text-[#00B3AD] font-semibold">
                                5
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900">Protection des données personnelles</h2>
                        </div>

                        <div class="prose max-w-none text-gray-600">
                            <div class="bg-[#00B3AD]/5 border-l-4 border-[#00B3AD] p-4 rounded-r-lg mb-6">
                                <p class="text-gray-900 font-medium">
                                    Nous nous engageons à protéger vos données personnelles conformément aux réglementations en vigueur.
                                </p>
                            </div>

                            <div class="ml-14 mb-8">
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">5.1 Collecte des données</h3>
                                <div class="bg-gray-50 rounded-lg p-6">
                                    <p class="text-gray-900 mb-4">Nous collectons les informations suivantes :</p>
                                    <ul class="space-y-4 text-gray-600">
                                        <li class="flex items-start">
                                            <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            <span>Informations d'identification (nom, adresse e-mail, nom de l'association, etc.)</span>
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            <span>Données techniques (adresse IP, cookies, historique de connexion, etc.)</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="ml-14 mb-8">
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">5.2 Utilisation des données</h3>
                                <p class="mb-4">
                                    Vos données sont utilisées uniquement dans le cadre de la gestion de la plateforme et ne seront jamais vendues à des tiers. Nous pouvons toutefois partager certaines données avec des prestataires de services de confiance pour assurer le bon fonctionnement de la plateforme.
                                </p>
                            </div>

                            <div class="ml-14">
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">5.3 Sécurité des données</h3>
                                <div class="bg-[#00B3AD]/5 p-4 rounded-lg">
                                    <p class="text-gray-900">
                                        Nous mettons en place des mesures de sécurité adaptées pour protéger vos données contre tout accès non autorisé, perte ou altération.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="section6" class="scroll-mt-16 border-t border-gray-200 pt-8">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-10 h-10 rounded-full bg-[#00B3AD]/10 flex items-center justify-center text-[#00B3AD] font-semibold">
                                6
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900">Propriété intellectuelle</h2>
                        </div>

                        <div class="ml-14 mb-8">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">6.1 Droits d'auteur</h3>
                            <div class="prose max-w-none text-gray-600">
                                <p class="mb-4">
                                    Sauf indication contraire, tout le contenu est notre propriété exclusive. Toute reproduction, distribution ou modification sans autorisation écrite est interdite.
                                </p>
                            </div>
                        </div>

                        <div class="ml-14">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">6.2 Contenu des utilisateurs</h3>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <p class="text-gray-900 mb-4">
                                    Vous conservez la propriété des contenus que vous publiez sur la plateforme, mais vous nous accordez une licence non exclusive pour les utiliser dans le cadre du fonctionnement de la plateforme.
                                </p>
                            </div>
                        </div>
                    </section>

                    <section id="section7" class="scroll-mt-16 border-t border-gray-200 pt-8">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-10 h-10 rounded-full bg-[#00B3AD]/10 flex items-center justify-center text-[#00B3AD] font-semibold">
                                7
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900">Suspension et résiliation</h2>
                        </div>

                        <div class="prose max-w-none text-gray-600">
                            <div class="bg-[#00B3AD]/5 border-l-4 border-[#00B3AD] p-4 rounded-r-lg mb-6">
                                <p class="text-gray-900 font-medium">
                                    Nous pouvons suspendre ou résilier votre compte dans les cas suivants :
                                </p>
                            </div>
                            <ul class="space-y-4 ml-14">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Non-respect des présentes Conditions d'utilisation</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Fourniture d'informations fausses ou trompeuses</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Activités frauduleuses ou nuisibles pour la plateforme ou d'autres utilisateurs</span>
                                </li>
                            </ul>
                        </div>
                    </section>

                    <section id="section8" class="scroll-mt-16 border-t border-gray-200 pt-8">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-10 h-10 rounded-full bg-[#00B3AD]/10 flex items-center justify-center text-[#00B3AD] font-semibold">
                                8
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900">Modifications des conditions</h2>
                        </div>

                        <div class="prose max-w-none text-gray-600">
                            <p class="mb-4">
                                Nous nous réservons le droit de modifier ces conditions à tout moment. Les utilisateurs seront informés des modifications par e-mail ou via une notification sur la plateforme. Il vous appartient de consulter régulièrement ces conditions pour rester informé(e).
                            </p>
                            <div class="bg-gray-50 rounded-lg p-6 mt-6">
                                <p class="text-gray-900 font-medium">
                                    Si vous continuez à utiliser la plateforme après une modification des conditions, vous acceptez ces changements.
                                </p>
                            </div>
                        </div>
                    </section>

                    <section id="section9" class="scroll-mt-16 border-t border-gray-200 pt-8">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-10 h-10 rounded-full bg-[#00B3AD]/10 flex items-center justify-center text-[#00B3AD] font-semibold">
                                9
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900">Loi applicable et juridiction</h2>
                        </div>

                        <div class="prose max-w-none text-gray-600">
                            <div class="bg-[#00B3AD]/5 border-l-4 border-[#00B3AD] p-4 rounded-r-lg">
                                <p class="text-gray-900">
                                    Les présentes Conditions d'utilisation sont régies par les lois du Maroc. En cas de litige, les tribunaux compétents seront ceux du Maroc, sauf dispositions légales contraires.
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div></div></div></div>
</template>