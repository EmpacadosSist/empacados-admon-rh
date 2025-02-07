var CONFIG = {
  title: { color: '#05668d', text: 'Interactive organization chart' },
  information:
    'Do you see something wrong? Please drop a <em>mail</em> to <a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">someone@example.com</a>',
  photoUrl: { prefix: 'photos/', suffix: '.png' },
  startView: {
    photos: true,
    names: true,
    columnview: true,
    staffColumnview: false,
    showNrDepartments: true,
    showNrPeople: true,
  },
  enableScreenCapture: true,
  levelColors: [
    '#0c058d',
    '#05668d',
    '#8d6e05',
    '#8d2305',
    '#cfb303',
  ],
  editCommand: '_edit',
  dataFields: [{ name: 'Location', type: 'text' }],
}
