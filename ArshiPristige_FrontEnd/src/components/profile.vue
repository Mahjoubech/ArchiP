<template>
    <div>
      <component :is="profileComponent"></component>  
    </div>
  </template>
  
  <script>
  import { authStore } from "@/stores/auth";
  import profileAdmin from '@/views/admin/profile/show.vue'
  import profileAssociation from '@/views/association/profile/show.vue'

  
  export default {
    data() {
      return {
        profileComponent: null
      }
    },
    mounted() {
      
      if (authStore.role === 'admin') {
        this.profileComponent = profileAdmin;
      } else if (authStore.role === 'association') {
        this.profileComponent = profileAssociation;
      } else {
        this.profileComponent = null; 
      }
    }
  }
  </script>
  