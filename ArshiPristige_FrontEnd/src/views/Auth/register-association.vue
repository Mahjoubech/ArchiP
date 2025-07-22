<template>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
      <div class="relative bg-[#C9559B] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">Enregistrer une Association</h1>
            <p class="text-xl opacity-90 max-w-3xl mx-auto">
              Rejoignez notre plateforme et faites connaître votre association.
            </p>
          </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-gray-50 transform skew-y-2 -mb-10"></div>
      </div>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-2xl shadow-xl">
          <div class="max-w-6xl mx-auto p-8">
            <form class="space-y-8">
              <div class="border-b border-gray-200">
                <div class="max-w-5xl mx-auto">
                  <div class="flex flex-wrap justify-between items-center gap-4 p-4 md:p-8">
                    <div class="flex items-center space-x-4">
                      <span :class="['w-10 h-10 rounded-full flex items-center justify-center text-lg font-semibold',
                                  activeSection === 'personal' ? 'bg-[#00B3AD] text-white' : 'bg-gray-200 text-gray-600']">1</span>
                      <button type="button" 
                              @click="activeSection = 'personal'"
                              :class="['text-sm md:text-base font-bold focus:outline-none',
                              activeSection === 'personal' ? 'text-[#00B3AD]' : 'text-gray-600']">
                        Informations Personnelles
                      </button>
                    </div>
                    <div class="flex items-center space-x-4">
                      <span :class="['w-10 h-10 rounded-full flex items-center justify-center text-lg font-semibold',
                                  activeSection === 'association' ? 'bg-[#00B3AD] text-white' : 'bg-gray-200 text-gray-600']">2</span>
                      <button type="button" 
                              @click.prevent="validateAndProceed" 
                              :class="['text-sm md:text-base font-bold focus:outline-none',
                              activeSection === 'association' ? 'text-[#00B3AD]' : 'text-gray-600']">
                        Profil Association
                      </button>
                    </div>
                  </div>
                </div>
              </div>
  
              <div v-if="activeSection === 'personal'" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="space-y-6">
                  <h3 class="text-xl font-semibold text-gray-900">Informations Personnelles</h3>
                  <div class="grid grid-cols-2 gap-4">
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">
                        Civilité <span class="text-red-500">*</span>
                      </label>
                      <select v-model="formDataPersonnelles.civilite" name="civilite" required
                              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent">
                        <option value="">Sélectionnez</option>
                        <option value="M.">M.</option>
                        <option value="Mme">Mme</option>
                        <option value="Mlle">Mlle</option>
                      </select>
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">
                        CIN <span class="text-red-500">*</span>
                      </label>
                      <input v-model="formDataPersonnelles.cin" type="text" name="cin" required
                             class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                             placeholder="CIN">
                    </div>
                  </div>
                  <div class="grid grid-cols-2 gap-4">
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">
                        Prénom <span class="text-red-500">*</span>
                      </label>
                      <input v-model="formDataPersonnelles.prenom" type="text" name="prenom" required
                             class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                             placeholder="Prénom">
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nom <span class="text-red-500">*</span>
                      </label>
                      <input v-model="formDataPersonnelles.nom" type="text" name="nom" required
                             class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                             placeholder="Nom">
                    </div>
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                      Date de naissance <span class="text-red-500">*</span>
                    </label>
                    <input v-model="formDataPersonnelles.date_naissance" type="date" name="date_naissance" required
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent">
                  </div>
                  <div class="grid grid-cols-2 gap-4">
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">
                        Téléphone 1 <span class="text-red-500">*</span>
                      </label>
                      <input v-model="formDataPersonnelles.telephone_1" type="tel" name="telephone_1" required
                             class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                             placeholder="+212 XXXXXXXXX">
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">
                        Téléphone 2
                      </label>
                      <input v-model="formDataPersonnelles.telephone_2" type="tel" name="telephone_2"
                             class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                             placeholder="+212 XXXXXXXXX">
                    </div>
                  </div>
                </div>
                <div class="space-y-6">
                  <h3 class="text-xl font-semibold text-gray-900">Compte et Contact</h3>
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                      Email <span class="text-red-500">*</span>
                    </label>
                    <input v-model="formDataPersonnelles.email" type="email" name="email" required
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                           placeholder="exemple@email.com">
                  </div>
                  <div class="grid grid-cols-2 gap-4">
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">
                        Mot de passe <span class="text-red-500">*</span>
                      </label>
                      <input v-model="formDataPersonnelles.password" type="password" name="password" required
                             class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                             placeholder="********">
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">
                        Confirmer le mot de passe <span class="text-red-500">*</span>
                      </label>
                      <input v-model="formDataPersonnelles.password_confirmation" type="password" name="password_confirmation" required
                             class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                             placeholder="********">
                    </div>
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                      Ville <span class="text-red-500">*</span>
                    </label>
                    <select v-model="formDataPersonnelles.ville" name="ville" required
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent">
                      <option value="">Sélectionnez une ville</option>
                      <option value="casablanca">Casablanca</option>
                      <option value="rabat">Rabat</option>
                      <option value="marrakech">Marrakech</option>
                      <option value="tanger">Tanger</option>
                      <option value="fes">Fès</option>
                    </select>
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                      Adresse <span class="text-red-500">*</span>
                    </label>
                    <textarea v-model="formDataPersonnelles.adresse" name="adresse" rows="3" required
                              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                              placeholder="Votre adresse complète"></textarea>
                  </div>
                  <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                    <div class="space-y-4">
                      <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center overflow-hidden">
                        <img v-if="formDataPersonnelles.imagePreview" :src="formDataPersonnelles.imagePreview" class="w-full h-full object-cover" alt="Preview">
                        <i v-else class="fas fa-user text-3xl text-gray-400"></i>
                      </div>
                      <div>
                        <label class="inline-flex items-center px-4 py-2 bg-[#00B3AD] text-white rounded-lg cursor-pointer hover:bg-[#009B96] transition-colors">
                          <i class="fas fa-upload mr-2"></i>
                          <span>Ajouter une photo</span>
                          <input type="file" @change="handleImageUpload($event, 'image')" name="image" class="hidden" accept="image/*" required>
                        </label>
                        <p class="text-xs text-gray-500 mt-2">Format JPG ou PNG, max 2MB</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
              <div v-if="activeSection === 'association'" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="space-y-6">
                  <h3 class="text-xl font-semibold text-gray-900">Informations sur l'Association</h3>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Nom de l'Association <span class="text-red-500">*</span></label>
                    <input v-model="formDataAssociation.nom_association" type="text" name="nom_association" required
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                           placeholder="Nom de l'association">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Date de création de l'Association <span class="text-red-500">*</span></label>
                    <input v-model="formDataAssociation.date_creation" type="date" name="date_naissance" required
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Numéro RNA <span class="text-red-500">*</span></label>
                    <input v-model="formDataAssociation.numero_rna_association" type="text" name="numero_rna_association" required
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                           placeholder="Numéro RNA">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Présentation sur votre association <span class="text-red-500">*</span></label>
                    <textarea v-model="formDataAssociation.objet_social" name="objet_social" rows="3" required
                              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                              placeholder="Objet social de l'association"></textarea>
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Site Web</label>
                    <input v-model="formDataAssociation.site_web" type="url" name="site_web"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                           placeholder="https://example.com">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Facebook link</label>
                    <input v-model="formDataAssociation.facebook" type="url" name="facebook"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                           placeholder="https://example.com">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Instagram link</label>
                    <input v-model="formDataAssociation.instagram" type="url" name="instagram"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                           placeholder="https://example.com">
                  </div>
                </div>
                <div class="space-y-6">
                  <h3 class="text-xl font-semibold text-gray-900"> Médias et Documents</h3>
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Logo de l'Association <span class="text-red-500">*</span></label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                      <div class="space-y-4">
                        <div class="mx-auto w-14 h-14 bg-gray-100 rounded-full flex items-center justify-center overflow-hidden">
                          <img v-if="formDataAssociation.logoPreview" :src="formDataAssociation.logoPreview" class="w-full h-full object-cover" alt="Preview">
                          <i v-else class="fas fa-user text-xl text-gray-400"></i>
                        </div>
                        <div>
                          <label class="inline-flex items-center px-4 py-2 bg-[#00B3AD] text-white rounded-lg cursor-pointer hover:bg-[#009B96] transition-colors">
                            <i class="fas fa-upload mr-2"></i>
                            <span>Ajouter le logo</span>
                            <input type="file" @change="handleImageUpload($event, 'logo')" name="logo" class="hidden" accept="image/*" required>
                          </label>
                          <p class="text-xs text-gray-500 mt-2">Format JPG ou PNG, max 2MB</p>
                        </div>
                      </div>
                    </div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 mt-2">Carte nationale d'identité du président <span class="text-red-500">*</span></label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                      <div class="space-y-4">
                        <div class="mx-auto w-14 h-14 bg-gray-100 rounded-full flex items-center justify-center overflow-hidden">
                          <img v-if="formDataAssociation.carte_nationalePreview" :src="formDataAssociation.carte_nationalePreview" class="w-full h-full object-cover" alt="Preview">
                          <i v-else class="fas fa-user text-xl text-gray-400"></i>
                        </div>
                        <div>
                          <label class="inline-flex items-center px-4 py-2 bg-[#00B3AD] text-white rounded-lg cursor-pointer hover:bg-[#009B96] transition-colors">
                            <i class="fas fa-upload mr-2"></i>
                            <span>Ajouter la carte nationale</span>
                            <input type="file" @change="handleImageUpload($event, 'carte_nationale')" name="carte_nationale" class="hidden" accept="image/*" required>
                          </label>
                          <p class="text-xs text-gray-500 mt-2">Format JPG ou PNG, max 2MB</p>
                        </div>
                      </div>
                    </div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 mt-2">Fichier PDF du statut ou loi fondamentale  <span class="text-red-500">*</span></label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                      <div class="space-y-4">
                        <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center">
                          <i v-if="!formDataAssociation.status_associationName" class="fas fa-file-pdf text-3xl text-gray-400"></i>
                          <i v-else class="fas fa-check-circle text-3xl text-green-500"></i>
                        </div>
                        <div>
                          <label class="inline-flex items-center px-4 py-2 bg-[#00B3AD] text-white rounded-lg cursor-pointer hover:bg-[#009B96] transition-colors">
                            <i class="fas fa-upload mr-2"></i>
                            <span>Ajouter votre PDF</span>
                            <input type="file" @change="handlepdfUpload" name="pdf" class="hidden" accept=".pdf">
                          </label>
                          <p class="text-xs text-gray-500 mt-2">Format PDF uniquement, max 2MB</p>
                        </div>
                        <div v-if="formDataAssociation.status_associationName" class="text-sm text-gray-700 mt-2">
                          <strong>Fichier téléchargé :</strong> {{ formDataAssociation.status_associationName }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
              <div v-if="activeSection === 'personal'" class="mt-6">
                <button @click.prevent="validateAndProceed" type="button"
                        class="w-full bg-[#00B3AD] text-white py-4 rounded-lg hover:bg-[#009B96] 
                            transition-colors duration-200 flex items-center justify-center space-x-2 text-lg">
                  <span>Continuer vers l'étape suivante</span>
                  <i class="fas fa-arrow-right"></i>
                </button>
              </div>
              <div v-if="activeSection === 'association'" class="mt-6">
                <button @click="submitForm" type="button"
                        class="w-full bg-[#00B3AD] text-white py-4 rounded-lg hover:bg-[#009B96] 
                            transition-colors duration-200 flex items-center justify-center space-x-2 text-lg">
                  <span>Valider l'inscription</span>
                  <i class="fas fa-arrow-right"></i>
                </button>
              </div>
              <div v-if="formError" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4">
                {{ formError }}
              </div>
              <div v-if="successMessage" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                {{ successMessage }}
              </div>
            </form>
          </div>
          <div class="border-t border-gray-200 p-8 bg-gray-50 rounded-b-2xl">
            <div class="max-w-6xl mx-auto flex justify-between items-center">
              <p class="text-gray-600">
                Déjà inscrit ? 
                <a href="#" class="text-[#00B3AD] hover:underline font-medium">Connectez-vous</a>
              </p>
            </div>
          </div>
        </div>
      </div>
  
      <div v-if="showSuccessModal" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="fixed inset-0 bg-black opacity-70"></div>
        
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 z-10 overflow-hidden transform transition-all duration-300 scale-100">
          <div class="bg-[#00B3AD] p-6 text-center">
            <div class="mx-auto w-20 h-20 rounded-full bg-white flex items-center justify-center mb-4">
              <i class="fas fa-check-circle text-[#00B3AD] text-5xl"></i>
            </div>
            <h3 class="text-xl font-bold text-white">Inscription réussie!</h3>
          </div>
          
          <div class="p-6">
            <div class="text-center space-y-4">
              <p class="text-gray-700">
                Votre inscription a été enregistrée avec succès. Elle est actuellement en attente de validation par un administrateur.
              </p>
              <p class="text-gray-700">
                Vous recevrez un e-mail une fois votre compte approuvé ou refusé.
              </p>
              
              <div class="bg-blue-50 rounded-lg p-4 mt-4 flex items-start">
                <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
                <p class="text-sm text-blue-800 text-left">
                  En attendant, vérifiez régulièrement votre boîte de réception et vos spams pour ne pas manquer notre notification.
                </p>
              </div>
            </div>
          </div>
          
          <div class="border-t border-gray-200 p-6 flex justify-center">
            <button 
              @click="redirectToLogin" 
              class="px-6 py-3 bg-[#C9559B] text-white rounded-lg hover:bg-[#b34c8b] transition-colors duration-200 flex items-center"
            >
              <span>Retourner à la page de connexion</span>
              <i class="fas fa-arrow-right ml-2"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import authapi from "@/api/auth";   
  
  export default {
    data() {
      return {
        activeSection: 'personal',
        formDataPersonnelles: {
          civilite: '',
          cin: '',
          prenom: '',
          nom: '',
          date_naissance: '',
          telephone_1: '',
          telephone_2: '',
          email: '',
          password: '',
          password_confirmation: '',
          ville: '',
          adresse: '',
          image: null,
          imagePreview: null,
        },
        formDataAssociation: {
          nom_association: '',
          date_creation: '',
          numero_rna_association: '',
          objet_social: '',
          site_web: '',
          facebook: '',
          instagram: '',
          logo: null,
          logoPreview: null,
          status_association: null,
          status_associationName: '',
          pdfPreview: null,
          carte_nationale: null,
          carte_nationalePreview: null,
        },
        formError: '',
        successMessage: '',
        showSuccessModal: false,
      };
    },
    methods: {
      validateAndProceed() {
        if (this.activeSection === 'personal') {
          if (this.validateForm()) {
            this.activeSection = 'association';
          }
        }
      },
      validateForm() {
        this.formError = '';
        const requiredInputs = [
          'civilite', 'cin', 'prenom', 'nom', 'date_naissance',
          'telephone_1', 'email', 'password', 'password_confirmation',
          'ville', 'adresse', 'image'
        ];
  
        for (const input of requiredInputs) {
          if (!this.formDataPersonnelles[input]) {
            this.formError = 'Veuillez remplir tous les champs obligatoires';
            return false;
          }
        }
        const phonePattern =  /^(?:\+212|0)[5-7][0-9]{8}$/;
        if (
          !phonePattern.test(this.formDataPersonnelles.telephone_1) ||
          (this.formDataPersonnelles.telephone_2 && !phonePattern.test(this.formDataPersonnelles.telephone_2))
        ) {
          this.formError = 'Format invalide. Exemple: 0612345678 ou +212612345678';
          return false;
        }
  
        if (this.formDataPersonnelles.password !== this.formDataPersonnelles.password_confirmation) {
          this.formError = 'Les mots de passe ne correspondent pas';
          return false;
        }
        const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?.&]).{8,}$/;
        if (!passwordRegex.test(this.formDataPersonnelles.password)) {
          this.formError = 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial';
          return false;
        }
  
        if (this.formDataPersonnelles.date_naissance) {
          const birthDate = new Date(this.formDataPersonnelles.date_naissance);
          const today = new Date();
          const age = Math.floor((today - birthDate) / (365.25 * 24 * 60 * 60 * 1000));
          
          if (age < 18) {
            this.formError = 'Vous devez avoir au moins 18 ans pour vous inscrire';
            return false;
          }
        }
  
        return true;
      },
      validateForm2() {
        this.formError = '';
        this.successMessage = '';
        const requiredInputs = [
          'nom_association', 'date_creation', 'numero_rna_association',
          'objet_social', 'logo', 'status_association', 'carte_nationale'
        ];
  
        for (const input of requiredInputs) {
          if (!this.formDataAssociation[input]) {
            this.formError = 'Veuillez remplir tous les champs obligatoires';
            return false;
          }
        }
  
        if (this.formDataAssociation.logo && this.formDataAssociation.logo.size > 2 * 1024 * 1024) {
          this.formError = 'Le logo ne doit pas dépasser 2MB';
          return false;
        }
  
        if (this.formDataAssociation.status_association && this.formDataAssociation.status_association.size > 2 * 1024 * 1024) {
          this.formError = 'Le fichier PDF ne doit pas dépasser 2MB';
          return false;
        }
  
        if (this.formDataAssociation.carte_nationale && this.formDataAssociation.carte_nationale.size > 2 * 1024 * 1024) {
          this.formError = 'La carte nationale ne doit pas dépasser 2MB';
          return false;
        }
  
        const urlPattern = /^(https?:\/\/)?([\w\-]+\.)+[\w\-]+(\/[\w\-]*)*$/;
        if (this.formDataAssociation.site_web && !urlPattern.test(this.formDataAssociation.site_web)) {
          this.formError = 'L\'URL du site web est invalide';
          return false;
        }
        if (this.formDataAssociation.facebook && !urlPattern.test(this.formDataAssociation.facebook)) {
          this.formError = 'L\'URL Facebook est invalide';
          return false;
        }
        if (this.formDataAssociation.instagram && !urlPattern.test(this.formDataAssociation.instagram)) {
          this.formError = 'L\'URL Instagram est invalide';
          return false;
        }
  
        return true;
      },
  
      handleImageUpload(event, fieldName) {
        const file = event.target.files[0];
        const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
  
        if (file) {
          if (!allowedTypes.includes(file.type)) {
            this.formError = 'Format d\'image invalide. Utilisez JPG ou PNG uniquement';
            return;
          }
  
          if (file.size > 2 * 1024 * 1024) {
            this.formError = 'L\'image ne doit pas dépasser 2MB';
            return;
          }
          this.formError = '';
          if(fieldName === "image"){
            this.formDataPersonnelles.image = file;
            this.formDataPersonnelles.imagePreview = URL.createObjectURL(file);
          }else{
            this.formDataAssociation[fieldName] = file;
            this.formDataAssociation[`${fieldName}Preview`] = URL.createObjectURL(file);
          }
        }
      },
  
      handlepdfUpload(event) {
        const file = event.target.files[0];
        if (file) {
          if (file.type !== 'application/pdf') {
            this.formError = 'Format de fichier invalide. Utilisez uniquement le format PDF';
            return;
          }
          this.formError = '';
          this.formDataAssociation.status_association = file;
          this.formDataAssociation.status_associationName = file.name;
        }
      },
  
      async submitForm() {
        if (!this.validateForm() || !this.validateForm2()) {
          return; 
        }
        try {
          const formData = new FormData();
  
          for (const key in this.formDataPersonnelles) {
            formData.append(key, this.formDataPersonnelles[key]);
          }
  
          for (const key in this.formDataAssociation) {
            formData.append(key, this.formDataAssociation[key]);
          }
          const response = await authapi.registerAssociation(formData);
  
          if (response.status === 201) {
            this.formError = '';
            this.showSuccessModal = true; // Afficher le modal au lieu du message simple
          }
        } catch (error) {
          if (error.response && error.response.data && error.response.data.message && error.response.data.errors) {
            const erreurs = Object.values(error.response.data.errors)
              .flat()
              .join('\n');
            this.formError = erreurs;
          } else {
            this.formError = 'Une erreur est survenue lors de l\'inscription.'; 
          }
        }
      },
      
      redirectToLogin() {
        this.$router.push('/login');
      }
    },
  };
  </script>
  
  <style scoped>
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: scale(0.9);
    }
    to {
      opacity: 1;
      transform: scale(1);
    }
  }
  
  .scale-100 {
    animation: fadeIn 0.3s ease-in-out;
  }
  
  .text-shadow {
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
  }
  </style>