import { StyleSheet } from 'react-native';

export default StyleSheet.create({
  ':after': {
    boxSizing: 'border-box'
  },
  ':before': {
    boxSizing: 'border-box'
  },
  'a': {
    color: '#337ab7',
    textDecoration: 'none'
  },
  'i': {
    marginBottom: [{ unit: 'px', value: 4 }]
  },
  btn: {
    display: 'inline-block',
    fontSize: [{ unit: 'px', value: 14 }],
    fontWeight: '400',
    lineHeight: [{ unit: 'px', value: 1.42857143 }],
    textAlign: 'center',
    whiteSpace: 'nowrap',
    verticalAlign: 'middle',
    cursor: 'pointer',
    userSelect: 'none',
    backgroundImage: 'none',
    border: [{ unit: 'px', value: 1 }, { unit: 'string', value: 'solid' }, { unit: 'string', value: 'transparent' }],
    borderRadius: '4px'
  },
  'btn-app': {
    color: 'white',
    boxShadow: [{ unit: 'string', value: 'none' }, { unit: 'string', value: 'none' }, { unit: 'string', value: 'none' }, { unit: 'string', value: 'none' }],
    borderRadius: '3px',
    position: 'relative',
    padding: [{ unit: 'px', value: 10 }, { unit: 'px', value: 15 }, { unit: 'px', value: 10 }, { unit: 'px', value: 15 }],
    margin: [{ unit: 'px', value: 0 }, { unit: 'px', value: 0 }, { unit: 'px', value: 0 }, { unit: 'px', value: 0 }],
    minWidth: [{ unit: 'px', value: 60 }],
    maxWidth: [{ unit: 'px', value: 80 }],
    textAlign: 'center',
    border: [{ unit: 'px', value: 1 }, { unit: 'string', value: 'solid' }, { unit: 'string', value: '#ddd' }],
    backgroundColor: '#f4f4f4',
    fontSize: [{ unit: 'px', value: 12 }],
    transition: 'all .2s',
    backgroundColor: 'steelblue !important'
  },
  'btn-app > fa': {
    fontSize: [{ unit: 'px', value: 30 }],
    display: 'block'
  },
  'btn-app > glyphicon': {
    fontSize: [{ unit: 'px', value: 30 }],
    display: 'block'
  },
  'btn-app > ion': {
    fontSize: [{ unit: 'px', value: 30 }],
    display: 'block'
  },
  'btn-app:hover': {
    borderColor: '#aaa',
    transform: 'scale(1.1)'
  },
  pdf: {
    backgroundColor: '#dc2f2f !important'
  },
  excel: {
    backgroundColor: '#3ca23c !important'
  },
  csv: {
    backgroundColor: '#e86c3a !important'
  },
  imprimir: {
    backgroundColor: '#8766b1 !important'
  },
  // Esto es opcional pero sirve para que todos los botones de exportacion se distribuyan de manera equitativa usando flexbox

.flexcontent {
    display: flex;
    justify-content: space-around;
}
  selectTable: {
    height: [{ unit: 'px', value: 40 }],
    float: 'right'
  },
  'divdataTables_wrapper divdataTables_filter': {
    textAlign: 'left',
    marginTop: [{ unit: 'px', value: 15 }]
  },
  'btn-secondary': {
    color: '#fff',
    backgroundColor: '#4682b4',
    borderColor: '#4682b4'
  },
  'btn-secondary:hover': {
    color: '#fff',
    backgroundColor: '#315f86',
    borderColor: '#545b62'
  },
  'titulo-tabla': {
    color: '#606263',
    textAlign: 'center',
    marginTop: [{ unit: 'px', value: 15 }],
    marginBottom: [{ unit: 'px', value: 15 }],
    fontWeight: 'bold'
  },
  inline: {
    display: 'inline-block',
    padding: [{ unit: 'px', value: 0 }, { unit: 'px', value: 0 }, { unit: 'px', value: 0 }, { unit: 'px', value: 0 }]
  }
});
