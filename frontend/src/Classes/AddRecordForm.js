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
      fields: [
        {
          placeholder: 'Stress Level (1 - 10)',
          name: 'stressLevel',
          label: 'Stress Level',
          rules: 'required|integer|between:1,10',
        },
        {
          placeholder: 'Fatigue Level (1 - 10)',
          name: 'fatigueLevel',
          label: 'Fatigue Level',
          rules: 'required|integer|between:1,10',
        },
        {
          placeholder: 'Inspiration Level (1 - 10)',
          name: 'inspirationLevel',
          label: 'Inspiration Level',
          rules: 'required|integer|between:1,10',
        },
        {
          placeholder: 'Will Power Level (1 - 10)',
          name: 'willPowerLevel',
          label: 'Will Power Level',
          rules: 'required|integer|between:',
        },
        {
          placeholder: 'Productivity Level (1 - 10)',
          name: 'productivityLevel',
          label: 'Productivity Level',
          rules: 'required|integer|between:',
        },
        {
          placeholder: 'Blood Pressure High (90 - 200)',
          name: 'bloodPressureHigh',
          label: 'Blood Pressure High',
          rules: 'integer|between:90-200',
        },
        {
          placeholder: 'Blood Pressure Log (40 - 150)',
          name: 'bloodPressureLow',
          label: 'Blood Pressure Log',
          rules: 'integer|between:40-150',
        },
        {
          placeholder: 'Pulse (40 - 150)',
          name: 'pulse',
          label: 'Pulse',
          rules: 'required|integer|between:40-150',
        },
        {
          placeholder: 'Steps taken',
          name: 'steps',
          label: 'Steps taken',
          rules: 'integer|between:0-40000',
        },
        {
          placeholder: 'Weight (kg)',
          name: 'weight',
          label: 'Weight (kg)',
          rules: 'float|between:60-130',
        },
        {
          placeholder: 'Sleep Duration',
          name: 'sleepDuration',
          label: 'Sleep Duration (hours)',
          rules: 'float|between:0-20',
        },
        {
          placeholder: 'Sleep Quality (1-10)',
          name: 'sleepQuality',
          label: 'Sleep Quality',
          rules: 'integer|between:1-10',
        },
        {
          value: false,
          type: 'checkbox',
          name: 'drankYesterday',
          label: 'Was drinking Yesterday',
          rules: 'boolean',
        },
        {
          value: false,
          type: 'checkbox',
          name: 'drunk',
          label: 'Is drunk',
          rules: 'boolean',
        },
        {
          value: false,
          type: 'checkbox',
          name: 'exercised',
          label: 'Did exercises today',
          rules: 'boolean',
        },
        {
          value: false,
          type: 'checkbox',
          name: 'run',
          label: 'Was running today',
          rules: 'boolean',
        },
        {
          value: false,
          type: 'checkbox',
          name: 'bike',
          label: 'Used exercise bike today',
          rules: 'boolean',
        },
        {
          value: false,
          type: 'checkbox',
          name: 'hadSex',
          label: 'Had sex recently',
          rules: 'boolean',
        },
        {
          value: false,
          type: 'checkbox',
          name: 'walked',
          label: 'Had a walk today',
          rules: 'boolean',
        },
        {
          value: false,
          type: 'checkbox',
          name: 'beenToTomSour',
          label: 'Had been in Tom Sour',
          rules: 'boolean',
        },
        {
          value: false,
          type: 'checkbox',
          name: 'hadDinnerAtRestaurant',
          label: 'Had dinner at restaurant',
          rules: 'boolean',
        },
        {
          value: false,
          type: 'checkbox',
          name: 'glutedOneself',
          label: 'Gluted out',
          rules: 'boolean',
        },
        {
          value: false,
          type: 'checkbox',
          name: 'hadShower',
          label: 'Had shower today',
          rules: 'boolean',
        },
        {
          value: false,
          type: 'checkbox',
          name: 'tookVitamins',
          label: 'Took vitamins today',
          rules: 'boolean',
        },
      ],
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
