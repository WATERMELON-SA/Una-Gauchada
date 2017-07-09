Popup.create({
    className: 'prompt'
});

<Popup
    className="mm-popup"
    btnClass="mm-popup__btn"
    closeBtn={true}
    closeHtml={null}
    defaultOk="Ok"
    defaultCancel="Cancel"
    wildClasses={false}
    closeOnOutsideClick={true} />

ReactDom.render(
    <Popup />,
    document.getElementById('app')
);