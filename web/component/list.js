var List = React.createClass({
  render: function () {
    var title = typeof document == 'undefined' ? 'Serverside rendered' : 'Browser rendered';

    return React.DOM.div(null, [
      React.DOM.h1(null, title),
      React.DOM.table(null, React.DOM.tbody(null,
        this.props.data.map(function (row) {
          return (
            React.DOM.tr(null,
              row.map(function (cell) {
                return React.DOM.td(null, cell);
              }))
          );
        })
      ))
    ]);
  }
});