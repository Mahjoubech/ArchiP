import axios from 'axios';

const api = 'http://127.0.0.1:8000/api';

export default {
  getProfile(token) {
    return axios.get(`${api}/profile`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  },

  updateUserInfo(data, token) {
    return axios.post(`${api}/profile/benevole/userInfo`, data, {
      headers: {
        Authorization: `Bearer ${token}`,
        
      }
    });
  },

  updateBenevoleDetails(data, token) {
    return axios.post(`${api}/profile/benevole/details`, data, {
      headers: {
        Authorization: `Bearer ${token}`,
      }
    });
  },

  getTop3Opportunites(token) {
    return axios.get(`${api}/profile/benevole/top3Opportunites`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  },

  updatePassword(passwordData, token) {
    return axios.put(`${api}/profile/password`, passwordData, {
      headers: {
        Authorization: `Bearer ${token}`,
        'Content-Type': 'application/json'
      }
    });
  },

  resetPassword(token) {
    return axios.post(`${api}/profile/reset-password`, {}, {
      headers: {
        Authorization: `Bearer ${token}`,
        'Content-Type': 'application/json'
      }
    });
}
}