import axios from 'axios';

const api = 'http://127.0.0.1:8000/api/dashboard';

export default {

    getAllCategories(token, page = 1, perPage = 10) {
        return axios.get(`${api}/categories?page=${page}&per_page=${perPage}`, {
          headers: {
            Authorization: `Bearer ${token}`,
          }
        });
      },

      addCategory(token, categoryData) {
        return axios.post(`${api}/categories`, 
          categoryData,
          {
            headers: {
              Authorization: `Bearer ${token}`,
            }
          }
        );
      },

      updateCategory(token, categoryId, categoryData) {
        return axios.put(`${api}/categories/${categoryId}`, 
          categoryData,
          {
            headers: {
              Authorization: `Bearer ${token}`,
            }
          }
        );
      },

      deleteCategory(token, categoryId) {
        return axios.delete(`${api}/categories/${categoryId}`, {
          headers: {
            Authorization: `Bearer ${token}`,
          }
        });
      }
  }