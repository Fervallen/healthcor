import { Form } from 'mobx-react-form';
import validatorjs from 'validatorjs';

export default class AddRecordForm extends Form {
  /**
   * @returns {{dvr: Validator}}
   */
  plugins() {
    return { dvr: validatorjs };
  }

  /**
   * @returns {{fields: *[]}}
   */
  setup() {
    return {
      fields: [{
        name: 'email',
        label: 'Email',
        placeholder: 'Insert Email',
        rules: 'required|email|string|between:5,25',
        value: 's.jobs@apple.com'
      }, {
        name: 'password',
        label: 'Password',
        placeholder: 'Insert Password',
        rules: 'required|string|between:5,25',
      }, {
        name: 'passwordConfirm',
        label: 'Password Confirmation',
        placeholder: 'Confirm Password',
        rules: 'required|string|same:password',
      }],
    };
  }

  /**
   * @returns {{onSuccess(*): void}}
   */
  hooks() {
    return {
      onSuccess(form) {
        console.log('Form Values!', form.values());
      },
    };
  }
}
