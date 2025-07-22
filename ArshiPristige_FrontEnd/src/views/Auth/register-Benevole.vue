    <template>
        <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
            <div class="relative bg-[#00B3AD] text-white py-16">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h1 class="text-4xl font-bold mb-4">Devenir Bénévole</h1>
                        <p class="text-xl opacity-90 max-w-3xl mx-auto">
                            Rejoignez notre communauté et participez à des missions qui vous correspondent
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
                                                activeSection === 'personal' ? 'bg-[#C9559B] text-white' : 'bg-gray-200 text-gray-600']">1</span>
                                            <button type="button" 
                                                @click="activeSection = 'personal'"
                                                :class="['text-sm md:text-base font-bold focus:outline-none',
                                                activeSection === 'personal' ? 'text-[#C9559B]' : 'text-gray-600']">
                                                Informations Personnelles
                                            </button>
                                        </div>
                                        <div class="flex items-center space-x-4">
                                            <span :class="['w-10 h-10 rounded-full flex items-center justify-center text-lg font-semibold',
                                                activeSection === 'volunteer' ? 'bg-[#C9559B] text-white' : 'bg-gray-200 text-gray-600']">2</span>
                                            <button type="button" 
                                                @click.prevent="validateAndProceed" 
                                                :class="['text-sm md:text-base font-bold focus:outline-none',
                                                activeSection === 'volunteer' ? 'text-[#C9559B]' : 'text-gray-600']">
                                                Profil Bénévole
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
                                                    <input type="file" @change="handleImageUpload" name="image" class="hidden" accept="image/*" required>
                                                </label>
                                                <p class="text-xs text-gray-500 mt-2">Format JPG ou PNG, max 2MB</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div v-if="activeSection === 'volunteer'" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                <div class="space-y-6">
                                    <h3 class="text-xl font-semibold text-gray-900">Profil Bénévole</h3>
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Domaines d'action <span class="text-red-500">*</span></label>
                                        <div class="flex flex-wrap gap-4">
                                            <label v-for="option in domaines_action" :key="option.value" class="flex items-center space-x-2">
                                                <input type="checkbox" :value="option.value" v-model="formDataProfil.domaines_action" class="text-[#00B3AD] focus:ring-[#00B3AD]"/>
                                                <span>{{ option.label }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Types de mission
                                        </label>
                                        <select v-model="formDataProfil.types_mission" name="types_mission" required
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent">
                                            <option value="" disabled>Sélectionnez un type de mission</option>
                                            <option value="ponctuel">Missions ponctuelles</option>
                                            <option value="regulier">Engagement régulier</option>
                                            <option value="distance">À distance</option>
                                            <option value="terrain">Sur le terrain</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Disponibilités
                                        </label>
                                        <select v-model="formDataProfil.disponibilites" required
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent">
                                            <option value="" disabled selected>Sélectionnez disponibilités</option>
                                            <option value="semaine">En semaine</option>
                                            <option value="weekend">Weekend</option>
                                            <option value="matin">Matin</option>
                                            <option value="apres-midi">Après-midi</option>
                                            <option value="soir">Soir</option>
                                        </select>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Missions préférées</label>
                                        <div class="flex flex-wrap gap-4">
                                            <label v-for="option in missions_preferrees" :key="option.value" class="flex items-center space-x-2">
                                                <input type="checkbox" :value="option.value" v-model="formDataProfil.missions_preferrees" class="text-[#00B3AD] focus:ring-[#00B3AD]"/>
                                                <span>{{ option.label }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-6">
                                    <h3 class="text-xl font-semibold text-gray-900">Expérience et Compétences</h3>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Niveau d'études
                                        </label>
                                        <select v-model="formDataProfil.niveau_etudes" name="niveau_etudes"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent">
                                            <option value="" disabled>Sélectionnez un niveau</option>
                                            <option value="bac">Baccalauréat</option>
                                            <option value="bac+2">Bac+2</option>
                                            <option value="bac+3">Bac+3</option>
                                            <option value="bac+5">Bac+5</option>
                                            <option value="doctorat">Doctorat</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Métier actuel
                                        </label>
                                        <input v-model="formDataProfil.metier" type="text" name="metier"
                                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                                            placeholder="Votre profession actuelle">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Talents et compétences
                                        </label>
                                        <textarea v-model="formDataProfil.talents" name="talents" rows="3"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                                                placeholder="Décrivez vos talents et compétences particulières"></textarea>
                                    </div>
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                                        <div class="space-y-4">
                                            <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center">
                                                <i v-if="!formDataProfil.cv" class="fas fa-file-pdf text-3xl text-gray-400"></i>
                                                <i v-else class="fas fa-check-circle text-3xl text-green-500"></i>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center px-4 py-2 bg-[#00B3AD] text-white rounded-lg cursor-pointer hover:bg-[#009B96] transition-colors">
                                                    <i class="fas fa-upload mr-2"></i>
                                                    <span>Ajouter votre CV</span>
                                                    <input type="file" @change="handleCVUpload" name="cv" class="hidden" accept=".pdf">
                                                </label>
                                                <p class="text-xs text-gray-500 mt-2">Format PDF uniquement, max 2MB</p>
                                            </div>
                                            <div v-if="formDataProfil.cvName" class="text-sm text-gray-700 mt-2">
                                                <strong>Fichier téléchargé :</strong> {{ formDataProfil.cvName }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Navigation Buttons -->
                            <div v-if="activeSection === 'personal'" class="mt-6">
                                <button @click.prevent="validateAndProceed" type="button"
                                        class="w-full bg-[#00B3AD] text-white py-4 rounded-lg hover:bg-[#009B96] 
                                            transition-colors duration-200 flex items-center justify-center space-x-2 text-lg">
                                    <span>Continuer vers l'étape suivante</span>
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                            <div v-if="activeSection === 'volunteer'" class="mt-6">
                                <button @click="submitForm" type="button"
                                        class="w-full bg-[#00B3AD] text-white py-4 rounded-lg hover:bg-[#009B96] 
                                            transition-colors duration-200 flex items-center justify-center space-x-2 text-lg">
                                    <span>Valider l’inscription</span>
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
        </div>
    </template>

    <script>
    import authapi from "@/api/auth";   

    export default {
        data() {
            return {
                activeSection: 'personal',
                currentDateTime: new Date().toISOString().slice(0, 19).replace('T', ' '),
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
                formDataProfil: {
                    types_mission: "",
                    disponibilites: "",
                    missions_preferrees: [],
                    niveau_etudes: '',
                    metier: '',
                    talents: '',
                    cv: null,
                    domaines_action: [],
                },
                domaines_action: [
                    { value: "education", label: "Éducation" },
                    { value: "sante", label: "Santé" },
                    { value: "environnement", label: "Environnement" },
                    { value: "culture", label: "Culture" },
                    { value: "social", label: "Action sociale" },
                    { value: "sport", label: "Sport" },
                ],
                missions_preferrees: [
                    { value: "Urgence", label: "Urgence" },
                    { value: "Mission Régulière", label: "Mission Régulière" },
                    { value: "Télé-bénévolat", label: "Télé-bénévolat" },
                ],
                formError: '',
                successMessage: '',
            };
        },
        methods: {
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
                    this.formError = 'Les numéros de téléphone doivent respecter le format +212XXXXXXXXX';
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
            validateVolunteerProfile() {
                this.formError = '';
                this.successMessage = '';
                const requiredVolunteerInputs = [
                    'domaines_action'
                ];

                for (const input of requiredVolunteerInputs) {
                    if (!this.formDataProfil[input] || this.formDataProfil[input].length === 0) {
                        this.formError = 'Veuillez remplir tous les champs obligatoires du profil bénévole';
                        return false;
                    }
                }

                if (this.formDataProfil.cv && this.formDataProfil.cv.size > 2 * 1024 * 1024) {
                    this.formError = 'Le CV ne doit pas dépasser 2MB';
                    return false;
                }

                return true;
            },

            handleImageUpload(event) {
                const file = event.target.files[0];
                const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                if (!allowedTypes.includes(file.type)) {
                    this.formError = 'Format d\'image invalide. Utilisez JPG ou PNG uniquement';
                    return;
                }
                if (file) {
                    if (file.size > 2 * 1024 * 1024) {
                        this.formError = 'L\'image ne doit pas dépasser 2MB';
                        return;
                    }
                    this.formDataPersonnelles.image = file;
                    this.formDataPersonnelles.imagePreview = URL.createObjectURL(file);
                }
            },

            handleCVUpload(event) {
                const file = event.target.files[0];
                if (file && file.type !== 'application/pdf') {
                    this.formError = 'Format de fichier invalide. Utilisez uniquement le format PDF';
                    return;
                }
                this.formDataProfil.cv = file;
                this.formDataProfil.cvName = file.name;
            },
            
            

            validateAndProceed() {
                if (this.activeSection === 'personal') {
                    if (this.validateForm()) {
                        this.activeSection = 'volunteer';
                    }
                }
            },
            async submitForm() {
                if (!this.validateForm() || !this.validateVolunteerProfile()) {
                    return; 
                }
                try {
                    const formData = new FormData();

                    for (const key in this.formDataPersonnelles) {
                        formData.append(key, this.formDataPersonnelles[key]);
                    }

                    for (const key in this.formDataProfil) {
                        if (Array.isArray(this.formDataProfil[key])) {
                            this.formDataProfil[key].forEach(value => {
                                formData.append(`${key}[]`, value);
                            });
                        } else {
                            formData.append(key, this.formDataProfil[key] || '');
                        }
                    }

                    const response = await authapi.registerBenevole(formData);

                    if (response.status === 201) {
                        this.formError = '';
                        this.successMessage = 'Votre association a été enregistrée avec succès !';
            
                        setTimeout(() => {
                            this.$router.push('/login');
                        }, 1500);
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
            }
        },
    }
    </script>