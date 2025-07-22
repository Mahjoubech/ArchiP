<template>
    <div>
      <component :is="dashboardComponent"></component>  
    </div>
  </template>
  
  <script>
  import { authStore } from "@/stores/auth";
  import DashboardAdmin from '@/views/admin/dashboardAdmin.vue'
  import DashboardAssociation from '@/views/association/dashboardAssociation.vue'

  
  export default {
    data() {
      return {
        dashboardComponent: null
      }
    },
    mounted() {
      
      if (authStore.role === 'admin') {
        this.dashboardComponent = DashboardAdmin;
      } else if (authStore.role === 'association') {
        this.dashboardComponent = DashboardAssociation;
      } else {
        this.dashboardComponent = null; 
      }
    }
  }
  </script>
  