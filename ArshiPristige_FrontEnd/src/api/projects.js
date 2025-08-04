import axios from 'axios';

const api = 'http://127.0.0.1:8000/api';

export default {
  getAllProjects() {
    return axios.get(`${api}/projects`);
  },

  getProjectById(id) {
    return axios.get(`${api}/projects/${id}`);
  },

  createProject(token, data) {
    return axios.post(`${api}/projects`, data, {
      headers: {
        Authorization: `Bearer ${token}`,
        'Content-Type': 'multipart/form-data'
      }
    });
  },

  getClientProjects(token) {
    return axios.get(`${api}/client/projects`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  },

  getArchitectProjects(token) {
    return axios.get(`${api}/architect/projects`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  },

  createProposal(token, projectId, data) {
    return axios.post(`${api}/projects/${projectId}/proposals`, data, {
      headers: {
        Authorization: `Bearer ${token}`,
        'Content-Type': 'multipart/form-data'
      }
    });
  }
};
