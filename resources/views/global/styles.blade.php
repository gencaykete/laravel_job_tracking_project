<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-responsive-bs/2.3.0/responsive.bootstrap.css" integrity="sha512-vI15fTaw/NoZgZcW6ipbDQf/BlDYDO7ae6+RWnSy9xSDC7L22BV1RdA8GtTjSFe4TLy+9twcCCnI29UbfbBhUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    #datatable_wrapper > .table-responsive {
        overflow: visible;
    }
</style>
<style>
    .table-loader{
        visibility:hidden;
    }
    .table-loader:before {
        visibility:visible;
        display:table-caption;
        content: " ";
        width: 100%;
        height: 600px;
        background-image:
            linear-gradient( rgba(235, 235, 235, 1) 1px, transparent 0 ),
            linear-gradient(90deg, rgba(235, 235, 235, 1) 1px, transparent 0 ),
            linear-gradient( 90deg, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.5) 15%, rgba(255, 255, 255, 0) 30% ),
            linear-gradient( rgba(240, 240, 242, 1) 35px, transparent 0 )
    ;

        background-repeat: repeat;

        background-size:
            1px 35px,
            calc(100% * 0.1666666666) 1px,
            30% 100%,
            2px 70px;

        background-position:
            0 0,
            0 0,
            0 0,
            0 0;

        animation: shine 0.5s infinite;
    }

    @keyframes shine {
        to {
            background-position:
                0 0,
                0 0,
                40% 0,
                0 0;
        }
    }

    @media (max-width: 768px){
        .admin-header{
            width: 100% !important;
            padding-top: 0 !important;
        }
    }


    .lag-variant-box {
        border: 1px solid #ddd
    }

    .lag-variant-box .title {
        display: flex;
        justify-content: center;
        align-items: center;
        border-bottom: 1px solid #ddd;
        padding: 5px
    }

    .lag-variant-box .title span {
        flex: 2
    }

    .lag-variant-box .title input {
        flex: 3
    }

    .lag-variant-box .title a {
        margin-left: 5px!important;
        display: flex!important;
        justify-content: center!important;
        align-items: center!important;
        text-align: center!important;
        height: 29px!important;
        width: 29px!important;
        padding: 0!important
    }

    .lag-variant-box .title a i {
        padding-right: 0!important
    }

    .lag-variant-box .variants {
        background: #eee
    }

    .lag-variant-box .variants .values {
        height: 250px;
        overflow-y: auto
    }

    .lag-variant-box .variants .value {
        display: flex;
        padding: 5px 15px 5px 5px;
        border-bottom: 1px solid rgba(0,0,0,.2)
    }

    .lag-variant-box .variants .value input {
        flex: 3;
        height: calc(2.3rem)
    }

    .lag-variant-box .variants .value .buttons {
        display: flex;
        justify-content: center;
        align-items: center;
        flex: 1
    }

    .lag-variant-box .variants .value .buttons a {
        display: flex;
        justify-content: center;
        align-items: center;
        flex: 1;
        font-size: 15px
    }

    .variant-filter-box {
        display: flex;
        align-items: center;
        padding: 10px 0
    }

    .variant-filter-box span {
        font-weight: 400!important
    }

    .variant-filter-box input {
        flex: 1;
        margin-left: 20px;
        max-width: 200px
    }
</style>
