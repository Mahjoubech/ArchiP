import axios from 'axios';

const api = 'http://127.0.0.1:8000/api';

export default {
  // Public routes
  getAllProjects(page = 1) {
    return axios.get(`${api}/projects?page=${page}`);
  },

  getFeaturedProjects() {
    return axios.get(`${api}/projects/featured`);
  },

  getProjectById(id) {
    return axios.get(`${api}/projects/${id}`);
  },

  searchProjects(params) {
    return axios.get(`${api}/projects/search`, { params });
  },

  // Client routes
  createProject(token, data) {
    return axios.post(`${api}/projects`, data, {
      headers: {
        Authorization: `Bearer ${token}`,
        'Content-Type': 'multipart/form-data'
      }
    });
  },

  getClientProjects(token, page = 1) {
    return axios.get(`${api}/client/projects?page=${page}`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  },

  updateProject(token, id, data) {
    return axios.put(`${api}/projects/${id}`, data, {
      headers: {
        Authorization: `Bearer ${token}`,
        'Content-Type': 'multipart/form-data'
      }
    });
  },

  deleteProject(token, id) {
    return axios.delete(`${api}/projects/${id}`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  },

  // Architect routes
  getArchitectProjects(token, page = 1) {
    return axios.get(`${api}/architect/projects?page=${page}`, {
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
  },

  getArchitectProposals(token, page = 1) {
    return axios.get(`${api}/architect/proposals?page=${page}`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  },

  updateProposal(token, id, data) {
    return axios.put(`${api}/proposals/${id}`, data, {
      headers: {
        Authorization: `Bearer ${token}`,
        'Content-Type': 'multipart/form-data'
      }
    });
  },

  // Client proposal management
  updateProposalStatus(token, id, status) {
    return axios.put(`${api}/proposals/${id}/status`, { status }, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  }
};