import { Form } from 'mobx-react-form';
import validatorjs from 'validatorjs';

export default class RecordForm extends Form {
  /**
   * @param {Function} onSubmit
   */
  constructor(onSubmit) {
    super();
    this.submitMethod = onSubmit;
  }

  /**
   * @returns {{dvr: Validator}}
   */
  plugins() {
    return {
      dvr: validatorjs
    };
  }

  /**
   * @returns {{fields: *[]}}
   */
  setup() {
    return {
      fields: [
        {
          placeholder: 'Day tasks difficulty (1 - 10)',
          name: 'dayDifficulty',
          label: 'Day difficulty',
          rules: 'integer|between:1,10',
        },
        {
          placeholder: 'Day success level (1 - 10)',
          name: 'daySuccess',
          label: 'Day success level',
          rules: 'integer|between:1,10',
        },
        {
          placeholder: 'Stress Intake (1 - 10)',
          name: 'stressLevel',
          label: 'Stress Level',
          rules: 'integer|between:1,10',
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
          rules: 'integer|between:1,10',
        },
        {
          placeholder: 'Productivity Level (1 - 10)',
          name: 'productivityLevel',
          label: 'Productivity Level',
          rules: 'integer|between:1,10',
        },
        {
          placeholder: 'Blood Pressure High (90 - 200)',
          name: 'bloodPressureHigh',
          label: 'Blood Pressure High',
          rules: 'integer|between:90,200',
        },
        {
          placeholder: 'Blood Pressure Log (40 - 150)',
          name: 'bloodPressureLow',
          label: 'Blood Pressure Log',
          rules: 'integer|between:40,150',
        },
        {
          placeholder: 'Pulse (40 - 150)',
          name: 'pulse',
          label: 'Pulse',
          rules: 'required|integer|between:40,150',
        },
        {
          placeholder: 'Steps taken',
          name: 'steps',
          label: 'Steps taken',
          rules: 'integer|between:0,40000',
        },
        {
          placeholder: 'Weight (kg)',
          name: 'weight',
          label: 'Weight (kg)',
          rules: 'numeric|between:50,130',
        },
        {
          placeholder: 'Sleep Duration',
          name: 'sleepDuration',
          label: 'Sleep Duration (hours)',
          rules: 'numeric|between:0,20',
        },
        {
          placeholder: 'Sleep Quality (1-10)',
          name: 'sleepQuality',
          label: 'Sleep Quality',
          rules: 'integer|between:1,10',
        },
        {
          placeholder: 'Food fitness level (1 - 10)',
          name: 'foodFitnessLevel',
          label: 'Food fitness level',
          rules: 'integer|between:1,10',
        },
        {
          type: 'checkbox',
          name: 'drankYesterday',
          label: 'Was drinking Yesterday',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'drunk',
          label: 'Is drunk',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'exercised',
          label: 'Did exercises today',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'run',
          label: 'Was running today',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'bike',
          label: 'Used exercise bike today',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'hadSex',
          label: 'Had sex',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'mastrubated',
          label: 'Mastrubated',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'walked',
          label: 'Had a walk today',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'glutedOneself',
          label: 'Gluted out',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'hadShower',
          label: 'Had shower today',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'tookVitamins',
          label: 'Took vitamins today',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'wokeUpOnTime',
          label: 'Woke up on time',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'wentToBedOnTime',
          label: 'Went to bed on time',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'difficultWakeUp',
          label: 'Difficult wake up',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'difficultFallingAsleep',
          label: 'Difficult falling asleep',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'hadAGoodBreakfast',
          label: 'Had a good breakfast',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'eatLate',
          label: 'Eat late',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'tookCaffeine',
          label: 'Took caffeine (tea, coffee)',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'drankSparklingLiquids',
          label: 'Drank sparkling liquids',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'hadAtLeastOneSuccess',
          label: 'Had at least one entry in SJ',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'hadNiceExtraordinaryEvent',
          label: 'Had a nice extraordinary event',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'playedGames',
          label: 'Played games',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'didSomeLearning',
          label: 'Did some learning',
          rules: 'boolean',
        },
        {
          type: 'checkbox',
          name: 'pessimisticMindset',
          label: 'Was pessimistic',
          rules: 'boolean',
        },
      ],
    };
  }

  /**
   * @returns {Object}
   */
  hooks() {
    return {
      onSuccess(form) {
        this.submitMethod(form.values());
      },
      onError(form) {},
    };
  }
}
