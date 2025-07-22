import axios from 'axios';

const api = 'http://127.0.0.1:8000/api/opportunites'; 

export default {
  getAll(page = 1) {
    return axios.get(`${api}?page=${page}`);
  },

  getTop3() {
    return axios.get(`${api}/Top`);
},

  getById(id) {
    return axios.get(`${api}/${id}`);
  },

  searchOpportunites(ville, titre, types = [], sort) {
    const params = { ville, titre, types, sort };
    return axios.get(`${api}/search`, { params });
  },

  getSimilarOpportunites(id) {
    return axios.get(`${api}/${id}/similar`);
  },






  
  




  
};

