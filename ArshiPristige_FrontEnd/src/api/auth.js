import axios from 'axios';

const api = 'http://127.0.0.1:8000/api';

export default {
  login(data) {
    return axios.post(`${api}/login`, data);
  },

  registerBenevole(data) {
    return axios.post(`${api}/benevole`, data, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    });
  },

  registerAssociation(data) {
    return axios.post(`${api}/association`, data, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    });
  },


  authStatus(token) {
    return axios.get(`${api}/auth-status`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
    },

    logout(token) {
      return axios.post(`${api}/logout`, null, {
        headers: {
          Authorization: `Bearer ${token}`
        }
      });
    },


  
};
