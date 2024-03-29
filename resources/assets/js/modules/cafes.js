import CafeAPI from '../api/cafe.js';

export const cafes = {
    /**
     * 初始化
     */
    state: {
        cafes: [],
        cafesLoadStatus: 0,

        cafe: {},
        cafeLoadStatus: 0,

        cafeAddStatus:0
    },
    /**
     * Defines the actions used to retrieve the data.
     */
    actions: {
        loadCafes( { commit } ){
            commit( 'setCafesLoadStatus', 1 );

            CafeAPI.getCafes()
                .then( function( response ){
                    commit( 'setCafes', response.data );
                    commit( 'setCafesLoadStatus', 2 );
                })
                .catch( function(){
                    commit( 'setCafes', [] );
                    commit( 'setCafesLoadStatus', 3 );
                });
        },

        loadCafe( { commit }, data ){
            commit( 'setCafeLoadStatus', 1 );

            CafeAPI.getCafe( data.id )
                .then( function( response ){
                    commit( 'setCafe', response.data );
                    commit( 'setCafeLoadStatus', 2 );
                })
                .catch( function(){
                    commit( 'setCafe', {} );
                    commit( 'setCafeLoadStatus', 3 );
                });

        },

        addCafe( { commit, state, dispatch }, data ){
            // 状态1表示开始添加
            commit( 'setCafeAddStatus', 1 );

            CafeAPI.postAddNewCafe( data.name, data.address, data.city, data.state, data.zip )
                .then( function( response ){
                    // 状态2表示添加成功
                    commit( 'setCafeAddStatus', 2 );
                    dispatch( 'loadCafes' );
                })
                .catch( function(){
                    // 状态3表示添加失败
                    commit( 'setCafeAddStatus', 3 );
                });
        }
    },
    /**
     * Defines the mutations used
     */
    mutations: {
        setCafesLoadStatus( state, status ){
            state.cafesLoadStatus = status;
        },

        setCafes( state, cafes ){
            state.cafes = cafes;
        },

        setCafeLoadStatus( state, status ){
            state.cafeLoadStatus = status;
        },

        setCafe( state, cafe ){
            state.cafe = cafe;
        },

        setCafeAddStatus(state, status) {
            state.cafeAddStatus = status;
        }
    },
    /**
     * Defines the getters used by the module
     */
    getters: {
        getCafesLoadStatus( state ){
            return state.cafesLoadStatus;
        },

        getCafes( state ){
            return state.cafes;
        },

        getCafeLoadStatus( state ){
            return state.cafeLoadStatus;
        },

        getCafe( state ){
            return state.cafe;
        },

        getCafeAddStatus( state) {
            return state.cafeAddStatus;
        }
    }
};