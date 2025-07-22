import axios from 'axios';

const api = 'http://127.0.0.1:8000/api/dashboard';

export default {

    getOpportunitesOfAssociation(token, page = 1) {
        return axios.get(`${api}/Myopportunites?page=${page}`, {
          headers: {
            Authorization: `Bearer ${token}`,
          }
        });
      },


  updateOpportunite(token, id, data) {
    return axios.post(`${api}/opportunite/${id}`, data, {
      headers: {
        Authorization: `Bearer ${token}`,
      }
    });
  }, 

  getAllCategorie() {
    return axios.get(`http://127.0.0.1:8000/api/categorie`);
},

createOpportunite(data, token) {
    return axios.post(`${api}/opportunite`, data, {
      headers: {
        Authorization: `Bearer ${token}`,
      }
    });
  },

  deleteOpportunite( token , id) {
    return axios.delete(`${api}/opportunite/${id}`, {
      headers: {
        Authorization: `Bearer ${token}`,
      }
    });
  },

  getProfileAssociation(token) {
    return axios.get(`${api}/profile`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  },

  getLastThreeOpportunites(token) {
    return axios.get(`${api}/lastThreeOpportunites`, {
      headers: {
        Authorization: `Bearer ${token}`,
      }
    });
  },

  updateAssociationInfo(data, token) {
    return axios.post(`${api}/profile/association/userInfo`, data, {
      headers: {
        Authorization: `Bearer ${token}`,
        
      }
    });
  },

  updateAssociationDetails(data, token) {
    return axios.post(`${api}/profile/association/details`, data, {
      headers: {
        Authorization: `Bearer ${token}`,
      }
    });
  },

      getByIdDash(id , token) {
        return axios.get(`${api}/association/opportunites/${id}`, {
          headers: {
            'Authorization': `Bearer ${token}`
          }
        });
      }

  

  }