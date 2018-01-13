import options from '../../Environment/options';
import 'whatwg-fetch';

export default class Model {
  static apiEndpoint = '';

  /**
   * @returns {Promise<Array>}
   */
  static all() {
    return this._fetch();
  }

  /**
   * @param {number} id
   * @returns {Promise<Array>}
   */
  static one(id) {
    return this._fetch(id);
  }

  /**
   * @returns {Promise<Object>}
   */
  static add(data) {
    return this._fetch('', 'POST', data);
  }

  /**
   * @returns {Promise<Object>}
   */
  static update(id, data) {
    return this._fetch(id, 'PATCH', data);
  }

  /**
   * @returns {Promise<Object>}
   */
  static delete(id) {
    return this._fetch(id, 'DELETE');
  }

  /**
   * @returns {Promise<number>}
   */
  static count() {
    return this._fetch('/count');
  }

  /**
   * @returns {Promise<Object>}
   */
  static last() {
    return this._fetch('/last');
  }

  /**
   * @param {string} endpoint
   * @param {string=} method
   * @param {Object=} data
   * @returns {Promise<*>}
   * @private
   */
  static _fetch(endpoint = '', method = 'GET', data = null) {
    let options = {};
    if (method !== 'GET') {
      options.method = method;
    }
    if (data) {
      options.body = this._prepareData(data);
    }

    return fetch(this._getUrl(endpoint), options).then((response) => response.json());
  }

  /**
   * @param {string|number=} endpoint
   * @returns {string}
   */
  static _getUrl(endpoint) {
    if (endpoint === parseInt(endpoint, 10)) {
      endpoint = '/' + endpoint;
    }

    return options.domain + '/api/' + this.apiEndpoint + endpoint;
  }

  /**
   * @param {Object} data
   * @return {Object}
   * @private
   */
  static _prepareData(data) {
    for (let field in data) {
      if (data.hasOwnProperty(field) && (data[field] === '')) {
        delete data[field];
      }
    }

    return JSON.stringify(data);
  }
}
