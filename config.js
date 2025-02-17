var CONFIG = {
  enableUserSettings: false,
  showUserManual: false,
  information:
    'Algo esta mal? Por favor envia un <em>mail</em> a <a href="mailto:sistemas@empacados.com?Subject=Hello%20again" target="_top">sistemas@empacados.com</a>',
    photoUrl: { prefix: '', suffix: '' },
    startView: {
    photos: true,
    names: true,
    columnview: true,
    staffColumnview: true,
    showNrDepartments: true,
    showNrPeople: true,
  },
  enableScreenCapture: true,
  levelColors: [
    '#3271a5', 
    '#588100',
    '#d2b202',
    '#dc6601',
    '#8d2305',

    // '#0c058d',
    // '#05668d',
    // '#8d6e05',
    // '#8d2305',
    // '#cfb303',
  ],


  editCommand: '_edit',
  dataFields: [{ name: 'Location', type: 'text' }],
  personProperties: [
    { name: 'Telefono', type: 'text', order: 4 },
    { name: 'Email', type: 'email', order: 1 },
    { name: 'Accountability', type: 'text', order: 0 },
  ],
} 
