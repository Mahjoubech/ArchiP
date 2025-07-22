import axios from 'axios';

const api = 'http://127.0.0.1:8000/api/dashboard';

export default {

      getProfile(token) {
        return axios.get(`${api}/admin/profile`, {
          headers: {
            Authorization: `Bearer ${token}`
          }
        });
      },

    getAllAssociations(token, page = 1) {
        return axios.get(`${api}/admin/associations?page=${page}`, {
          headers: {
            Authorization: `Bearer ${token}`,
          }
        });
      },

      getAssociationDetails(token, associationId) {
        return axios.get(`${api}/admin/associations/details/${associationId}`, {
          headers: {
            Authorization: `Bearer ${token}`,
          }
        });
      },

      updateAssociationStatus(token, associationId, statut) {
        return axios.put(`${api}/admin/associations/${associationId}/status`, 
          { statut },
          {
            headers: {
              Authorization: `Bearer ${token}`,
            }
          }
        );
      },

      updateOpportuniteStatus(token, opportunityId, status) {
        return axios.put(`${api}/admin/opportunites/${opportunityId}/status`, 
          { status },
          {
            headers: {
              Authorization: `Bearer ${token}`,
            }
          }
        );
      },

      getAllOpportunities(token, page = 1) {
        return axios.get(`${api}/admin/opportunites?page=${page}`, {
          headers: {
            Authorization: `Bearer ${token}`,
          }
        });
      },

      updateAdminInfo(data , token) {
        return axios.post(`${api}/profile/admin/userInfo`, data, {
          headers: {
            Authorization: `Bearer ${token}`,
            
          }
        });
      },

      getByIdDash(id , token) {
        return axios.get(`${api}/admin/opportunites/${id}`, {
          headers: {
            'Authorization': `Bearer ${token}`
          }
        });
      }
 


  

  }