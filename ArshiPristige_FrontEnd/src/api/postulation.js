import axios from 'axios';

const api = 'http://127.0.0.1:8000/api';

export default {
  getPostulationsByAssociation(token) {
    return axios.get(`${api}/dashboard/opportunite/postulations`, {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });
  },
  changeStatusBenevole(token, opportuniteId, benevoleId, status) {
    return axios.put(`${api}/dashboard/opportunite/${opportuniteId}/postulations/${benevoleId}`, 
      { etat: status },
      {
        headers: {
          Authorization: `Bearer ${token}`,
        }
      }
    );
  },
  getBenevoleDetails(token, benevoleId) {
    return axios.get(`${api}/dashboard/opportunite/benevole/${benevoleId}`, {
      headers: {
        Authorization: `Bearer ${token}`,
      }
    });
  },
  addPostulation(token, opportuniteId) {
    return axios.post(`${api}/benevole/postulation/add/${opportuniteId}`, {}, {
      headers: {
        'Authorization': `Bearer ${token}`,
      }
    });
  },
  checkIfAlreadyApplied(token, opportuniteId) {
    return axios.get(`${api}/benevole/postulation/check/${opportuniteId}`, {
      headers: {
        'Authorization': `Bearer ${token}`,
      }
    });
  }
}