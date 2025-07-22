<template>
    <div>
      <component :is="opportuniteComponent"></component>  
    </div>
  </template>
  
  <script>
  import { authStore } from "@/stores/auth";
  import opportunitesAdmin from '@/views/admin/opportunites/show.vue'
  import opportunitesAssociation from '@/views/association/opportunites/show.vue'

  
  export default {
    data() {
      return {
        opportuniteComponent: null
      }
    },
    mounted() {
      
      if (authStore.role === 'admin') {
        this.opportuniteComponent = opportunitesAdmin;
      } else if (authStore.role === 'association') {
        this.opportuniteComponent = opportunitesAssociation;
      } else {
        this.opportuniteComponent = null; 
      }
    }
  }
  </script>
  